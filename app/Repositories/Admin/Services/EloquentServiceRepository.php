<?php

namespace App\Repositories\Admin\Services;

use Pingpong\Admin\Entities\Article;

class EloquentServiceRepository implements ServiceRepository
{
    public function perPage()
    {
        return config('admin.service.perpage');
    }

    public function getModel()
    {
        $model = config('admin.service.model');

        return new $model();
    }

    public function allOrSearch($searchQuery = null)
    {
        if (is_null($searchQuery)) {
            return $this->getAll();
        }

        return $this->search($searchQuery);
    }

    public function getAll()
    {
        return $this->getModel()->latest()->paginate($this->perPage());
    }

    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";

        return $this->getModel()->where('title', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->orWhere('id', '=', $searchQuery)
            ->paginate($this->perPage())
        ;
    }

    public function findById($id)
    {
        $model = $this->getModel()->find($id);

        $model->entries;

        $model->prices;

        $model->packages;

        return $model;
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getModel()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function delete($id)
    {
        $article = $this->findById($id);

        if (!is_null($article)) {
            $article->delete();

            return true;
        }

        return false;
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }
}