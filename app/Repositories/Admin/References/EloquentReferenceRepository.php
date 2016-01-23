<?php

namespace App\Repositories\Admin\References;

use App\Entities\Reference;
use App\Utilities\ImageUploader;

class EloquentReferenceRepository implements ReferenceRepository
{
    /**
     * @var ImageUploader
     */
    protected $uploader;

    /**
     * @param ImageUploader $uploader
     */
    public function __construct(ImageUploader $uploader)
    {
        $this->uploader = $uploader;
    }    

    public function perPage()
    {
        return config('admin.reference.perpage');
    }

    public function getModel()
    {
        $model = config('admin.reference.model');

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
        return $this->getModel()->orderBy('sort_order')->paginate($this->perPage());
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

        $model->photos;

        return $model;
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getModel()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function delete($id)
    {
        $reference = $this->findById($id);

        if (!is_null($reference)) {
            $reference->delete();

            $reference->deletePhotos($id);

            return true;
        }

        return false;
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function update(array $data)
    {
        return $this->getModel()->update($data);
    }

    public function savePhotos($photos, $reference_id) 
    {
        return $this->getModel()->savePhotos($photos, $reference_id);
    }

    public function deletePhotos($reference_id) {
        return $this->getModel()->deletePhotos($reference_id);
    }
}
