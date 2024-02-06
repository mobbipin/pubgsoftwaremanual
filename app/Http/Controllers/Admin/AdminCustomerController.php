<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Contracts\Users\UserContract;
use App\Http\Requests\UserStoreRequest;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\UserUpdateRequest;

class AdminCustomerController extends Controller
{
    public function __construct(UserContract $userRepository, ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
        $this->userRepository = $userRepository;
    }
    public function index(Request $request)
    {
        $this->setPagetitle('User', '');
        return (request()->ajax())
            ? $this->datatable($request)
            : view('cms.admin.customers.index');
    }

    
    protected function datatable($request)
    {
        //  $users= $this->userRepository->listUsers('created_at', 'desc');
      
        $users=User::role(['user'])->get();

        return DataTables::of($users)
            ->editColumn('role_id', function ($data) {
                return $data->getRoleNames()->first();
            })
             ->editColumn('username', function ($data) {
                 return $data->username;
             })
          
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                          <a
                            href="' . route('admin.users.edit', $data) . '"
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
                        <a
                            href="' . route('admin.users.info', $data) . '"
                            type="button"
                            class="btn btn-warning waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Info"
                            data-bs-original-title="Info"
                        ><i class="bx bx-info-circle font-size-16 align-middle"></i></a>

                    </div>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['actions','address'])
            ->make(true);
    }
    public function create()
    {
        if (!auth()->user()->can('add user')) {
            abort(403);
        }

        $this->setPageTitle('User', '');
        $roles = \Spatie\Permission\Models\Role::all();
        return view('cms.admin.customers.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        if (!auth()->user()->can('add user')) {
            abort(403);
        }
        try {
            $user = $this->userRepository->storeUser($request->validated());

            if ($user) {
                $this->imageUploadService->uploadImageFromRequest($request, $user, 'image', 'image');
            }

            return $user
                ? $this->responseRedirect('admin.users.index', 'User Created Successfully', 'success')
                : $this->responseRedirectBack('User Created Successfully', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    public function edit(User $user)
    {
        $this->setPageTitle('User', '');
        $user->load('roles');
        $roles = \Spatie\Permission\Models\Role::all();
        return view('cms.admin.customers.edit', [
            'user' => $user,
            'roles'=>$roles,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        try {
            $user=$this->userRepository->updateUser($user->id, $request->validated());
            if ($user) {
                $this->imageUploadService->uploadImageFromRequest($request, $user, 'image', 'image');
            }
            return $user
                ? $this->responseRedirect('admin.users.index', 'User Updated Successfully', 'success')
                : $this->responseRedirectBack('There was some problem with the server. Please try again later.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }


    public function destroy(User $user)
    {
        return $user->delete()
            ? response()->json(['success' => 'User Successfully Deleted.'])
            : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }

    public function info(User $user)
    {
        $this->setPageTitle('User', '');

        return view('cms.admin.customers.info', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function userActivityLogsDatatable($id)
    {
        $activities = Activity::where('causer_type', 'App\Models\User')->where('causer_id', $id)->latest()->get();

        return DataTables::of($activities)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a');
            })
            ->addIndexColumn()
            ->make(true);
    }
}
