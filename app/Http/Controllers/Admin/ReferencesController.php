<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Utilities\ImageUploader;
use App\Validation\Admin\Reference\Create;
use App\Validation\Admin\Reference\Update;

class ReferencesController extends BaseController
{
	protected $references;

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

        $this->repository = app('App\Repositories\Admin\References\ReferenceRepository');
    }

    /**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return $this->redirect('admin.references.index')
            ->withFlashMessage('Post not found!')
            ->withFlashType('danger');
    }

    /**
     * Display a listing of references.
     *
     * @return Response
     */
    public function index()
    {
        $references = $this->repository->allOrSearch(Input::get('q'));

        $no = $references->firstItem();

        return $this->view('references.index', compact('references', 'no'));
    }

    /**
     * Show the form for creating a new reference.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view('references.create');
    }

    /**
     * Store a newly created reference in storage.
     *
     * @return Response
     */
    public function store(Create $request)
    {
        $data = $request->all();

        $data['user_id'] = \Auth::id();

        $reference_id = $this->repository->create($data)->id;

        // $this->repository->deletePhotos($reference_id);

        if (isset($data['photos'])) {
            foreach ($data['photos'] as $photo) {
                if ($photo != '') {
                    $this->uploader->setExt('.jpg')->upload_image($photo)->save('images/photos');

                    $file = $this->uploader->getFilename();

                    $this->repository->createPhoto($file, $reference_id);
                }
            }
        }

        return $this->redirect('references.index');
    }

    /**
     * Display the specified reference.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        try {
            $reference = $this->repository->findById($id);

            return $this->view('references.show', compact('reference'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Show the form for editing the specified reference.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        try {
            $reference = $this->repository->findById($id);

            return $this->view('references.edit', compact('reference'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Update the specified reference in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Update $request, $id)
    {
        try {
            $reference = $this->repository->findById($id);

            $data = $request->all();

            $data['user_id'] = \Auth::id();
            
            $reference->update($data);

            $this->repository->deletePhotos($id);

            if (isset($data['photos'])) {
                foreach ($data['photos'] as $photo) {
                    if ($photo != '') {
                        $this->uploader->setExt('.jpg')->upload_image($photo)->save('images/photos');

                        $file = $this->uploader->getFilename();

                        $this->repository->createPhoto($file, $id);
                    }
                }
            }          

            return $this->redirect('references.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified reference from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->delete($id);

            return $this->redirect('references.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
