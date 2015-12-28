<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Pingpong\Admin\Uploader\ImageUploader;
use App\Validation\Admin\Service\Create;
use App\Validation\Admin\Service\Update;

class ServicesController extends AdminBaseController
{
	protected $services;

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

        $this->repository = app('App\Repositories\Admin\Services\ServiceRepository');
    }

    /**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return $this->redirect('admin.services.index')
            ->withFlashMessage('Post not found!')
            ->withFlashType('danger');
    }

    /**
     * Display a listing of services.
     *
     * @return Response
     */
    public function index()
    {
        $services = $this->repository->allOrSearch(Input::get('q'));

        $no = $services->firstItem();

        return $this->view('services.index', compact('services', 'no'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view('services.create');
    }

    /**
     * Store a newly created service in storage.
     *
     * @return Response
     */
    public function store(Create $request)
    {
        $data = $request->all();

        unset($data['image']);

        if (\Input::hasFile('image')) {
            // upload image
            $this->uploader->upload('image')->save('images/services');

            $data['image'] = $this->uploader->getFilename();
        }

        $data['user_id'] = \Auth::id();
        $data['slug'] = Str::slug($data['title']);

        $this->repository->create($data);

        return $this->redirect('services.index');
    }

    /**
     * Display the specified service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        try {
            $service = $this->repository->findById($id);

            return $this->view('services.show', compact('service'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        try {
            $service = $this->repository->findById($id);

            return $this->view('services.edit', compact('service'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Update the specified service in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Update $request, $id)
    {
        try {
            $service = $this->repository->findById($id);

            $data = $request->all();

            unset($data['image']);
            unset($data['type']);

            if (\Input::hasFile('image')) {
                $service->deleteImage();

                $this->uploader->upload('image')->save('images/services');

                $data['image'] = $this->uploader->getFilename();
            }

            $data['user_id'] = \Auth::id();
            $data['slug'] = Str::slug($data['title']);
            $service->update($data);

            return $this->redirect('services.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified service from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->delete($id);

            return $this->redirect('services.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
