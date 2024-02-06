<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Contracts\Categories\CategoryContract;

class CategoryController extends Controller
{
    public function __construct(CategoryContract $categoryRepository, ImageUploadService $imageUploadService)
    {
        $this->categoryRepository=$categoryRepository;
        $this->imageUploadService=$imageUploadService;
    }
    public function index()
    {
        $this->setPageTitle('Category', '');
        return request()->ajax()
        ? $this->datatable()
        : view('cms.admin.categories.index');
    }

    public function create()
    {
        $categories =$this->categoryRepository->listCategories('id', 'asc');
        $this->setPageTitle('Category', 'Fill in the required fields to create a new category.');
        return view('cms.admin.categories.create', compact('categories'));
    }

    
    public function store(CategoryStoreRequest $request)
    {
        try {
            $category= $this->categoryRepository->storeCategory($request->validated());

            if ($category) {
                $this->imageUploadService->uploadImageFromRequest($request, $category, 'image', 'image');
            }

            return $category
                ? $this->responseRedirect('admin.categories.index', 'Category Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
//            return $this->responseBackWithException($exception);
            return $exception->getMessage();
        }
    }

    public function edit(Category $category)
    {
        $categories=$this->categoryRepository->listCategories('created_at', 'desc');
        $this->setPageTitle('Category', '');
        return view('cms.admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Category $category, CategoryUpdateRequest $request)
    {
        try {
            $updateCategory = $this->categoryRepository->updateCategory($category->id, $request->validated());

            if ($updateCategory) {
                $this->imageUploadService->uploadImageFromRequest($request, $category, 'image', 'image');
            }

            return $updateCategory
                ? $this->responseRedirect('admin.categories.index', 'Category Successfully Updated.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $this->responseBackWithException($exception);
        }
    }

    public function destroy(Category $category)
    {
        return $this->categoryRepository->deleteCategory($category->id)
           ? response()->json(['success' => 'Category Successfully Deleted.'])
           : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }


    protected function datatable()
    {
        $categories = $this->categoryRepository->listCategories('created_at', 'desc');
        return DataTables::of($categories)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('admin.categories.edit', $data) . '"
                            type="button"
                            class="btn btn-success waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit"
                            data-bs-original-title="Edit"
                        ><i class="bx bx-pencil font-size-16 align-middle"></i></a>
                        <a
                            href="#"
                            id="delete-btn"
                            data-id="' . $data->id . '"
                            type="button"
                            class="btn btn-danger waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete"
                            data-bs-original-title="Delete"
                        ><i class="bx bx-trash font-size-16 align-middle"></i></a>
                    </div>
                ';
            })
            ->editColumn('parent_id', function ($data) {
                return $data->parent->name ?? 'Root';
            })
            ->editColumn('level', function ($data) {
                return $data->level ?? '-';
            })
            ->editColumn('status', function ($data) {
                $checked = $data->status == 1 ? 'checked' : '';

                return '
                    <label for="is-status-switch-' . $data->id . '"></label>
                    <input
                        type="checkbox"
                        id="is-status-switch-' . $data->id . '"
                        data-id="' . $data->id . '"
                        name="is_status"
                        class="js-switch"
                        ' . $checked . '
                        autocomplete="off"
                        onchange="toggleIsStatus(' . $data->id . ')"
                    />
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['actions', 'parent_id', 'status'])
            ->make(true);
    }

    public function toggleIsStatus(Request $request): JsonResponse
    {
        return $this->categoryRepository->updateCategoryStatus($request->all())
            ? response()->json(['message' => 'Category Status Updated Successfully.',  'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating category status.', 'status' => 'error']);
    }
}
