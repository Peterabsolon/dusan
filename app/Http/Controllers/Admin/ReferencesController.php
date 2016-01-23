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
     * Upload photos
     */
    public function uploadPhotos($photo) {
        $photos = array();

        // Upload large photo
        $this->uploader->setExt('.jpg')->upload_image($photo)->save('images/photos');
        $photos['photo_large'] = $this->uploader->getFilename();

        // Determine aspect ratio
        $photo_size = getimagesize('images/photos/' . $photos['photo_large']);
        $photo_aspect_ratio = $photo_size[0] / $photo_size[1];

        // Upload medium photo
        $medium_width = 1200;
        $medium_height = $medium_width / $photo_aspect_ratio;

        $this->uploader->setExt('.jpg')->upload_image($photo)->resize($medium_width, $medium_height)->save('images/photos');
        $photos['photo_medium'] = $this->uploader->getFilename();

        // Upload small photo
        $small_width = 480;
        $small_height = $small_width / $photo_aspect_ratio;

        $this->uploader->setExt('.jpg')->upload_image($photo)->resize($small_width, $small_height)->save('images/photos');
        $photos['photo_small'] = $this->uploader->getFilename();

        // Upload small retina photo
        $small_2x_width = 960;
        $small_2x_height = $small_2x_width / $photo_aspect_ratio;

        $this->uploader->setExt('.jpg')->upload_image($photo)->resize($small_2x_width, $small_2x_height)->save('images/photos');
        $photos['photo_small_2x'] = $this->uploader->getFilename();

        return $photos;
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

        if (\Input::has('photos')) 
        {
            $photos = \Input::get('photos');

            $photo_count = count($photos);

            for ($i = 0; $i < $photo_count; $i++) {
                $photo = \Input::file('file-photo-' . $i);

                if ($photo) {
                    $photos = $this->uploadPhotos($photo);

                    $this->repository->savePhotos($photos, $reference_id);
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
            
            if (\Input::has('photos')) 
            {
                $photos = \Input::get('photos');

                $photo_count = count($photos);

                for ($i = 0; $i < $photo_count; $i++) {

                    // Existing image
                    if ($photos[$i] != '') {
                        $photo = 'images/photos/' . $photos[$i];

                        if (file_exists($photo)) {
                            $files = $this->uploadPhotos($photo);
 
                            $this->repository->savePhotos($files, $id);
                        }
                    } 

                    // New uploaded image
                    else {
                        $photo = \Input::file('file-photo-' . $i);

                        if ($photo) {
                            $files = $this->uploadPhotos($photo);
 
                            $this->repository->savePhotos($files, $id);
                        }
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
