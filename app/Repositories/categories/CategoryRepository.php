<?php

namespace App\Repositories\Categories;

use App\Contracts\Categories\CategoryContract;
use App\Models\Category;
use InvalidArgumentException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    

    public function storeCategory(array $params)
    {
        try {
            $collection = collect($params)->except('_token', 'image');

            if (!is_null($collection['parent_id'])) {
                if (is_null($collection['order_level'])) {
                    $category = Category::find($collection['parent_id']);
                    $counter=$category->children->count();
                    $level = $counter + 1;
                } else {
                    $level=$params['order_level'];
                }
            } else {
                $level = null;
            }
            
            $merge = $collection->merge(compact('level'));
            $category = $this->model->create($merge->all());
            return $category;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateCategory(int $id, array $params)
    {
        $collection = collect($params)->except('_token');
        if (!is_null($collection['parent_id'])) {
            if (is_null($collection['order_level'])) {
                $level=0;
                $category = $this->findCategoryById($id);
                $level = $category->level;
            } else {
                $level=$params['order_level'];
            }
        } else {
            $level = null;
        }
        $category = $this->findCategoryById($id);
        $merge = $collection->merge(compact('level'));

        return $category->update($merge->all());
    }

    public function deleteCategory(int $id)
    {
        $category = $this->findCategoryById($id);
        $category->delete();
        return $category;
    }

    public function updateCategoryStatus(array $params)
    {
        $category = $this->findCategoryById($params['category_id']);

        $category->status=$params['is_status'];
        return $category->update();
    }
}
