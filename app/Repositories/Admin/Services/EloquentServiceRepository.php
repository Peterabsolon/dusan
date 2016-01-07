<?php

namespace App\Repositories\Admin\Services;

use App\Entities\Admin\Service;

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

        $model->prices_left;

        $model->prices_right;

        $model->packages;

        return $model;
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getModel()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function delete($id)
    {
        $service = $this->findById($id);

        if (!is_null($service)) {
            $service->delete();

            return true;
        }

        return false;
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function createPrices($service_id, array $data)
    {
        return $this->getModel()->createPrices($service_id, $data);
    }

    public function createPackages($service_id, array $data)
    {
        return $this->getModel()->createPackages($service_id, $data);
    }

    public function update(array $data)
    {
        return $this->getModel()->update($data);
    }

    public function updatePrices($service_id, array $data)
    {
        return $this->getModel()->updatePrices($service_id, $data);
    }    

    public function updatePackages($service_id, array $data)
    {
        return $this->getModel()->updatePackages($service_id, $data);
    }        
}
