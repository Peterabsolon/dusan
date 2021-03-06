<?php

namespace App\Utilities;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ImageUploader
{
    /**
     * @var string
     */
    protected $ext = '.png';

    /**
     * @param $ext
     *
     * @return $this
     */
    public function setExt($ext)
    {
        $this->ext = $ext;

        return $this;
    }

    /**
     * @return string
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @return string
     */
    public function getRandomFilename()
    {
        return sha1(str_random()).$this->getExt();
    }

    /**
     * @return string
     */
    public function getDestinationFile()
    {
        return public_path(str_finish($this->path, '/').$this->filename);
    }

    /**
     * @param $width
     *
     * @return $this
     */
    public function widen($width)
    {
        $this->image->widen($width);

        return $this;
    }

    /**
     * @param $file
     *
     * @return $this
     */
    public function upload($file)
    {
        $this->filename = $this->getRandomFilename();
        $this->image = Image::make(Input::file($file)->getRealPath());

        return $this;
    }

    /**
     * @param  $image
     * 
     * @return $this
     */
    public function upload_image($image)
    {
        $this->filename = $this->getRandomFilename();
        $this->image = Image::make($image);

        return $this;
    }

    public function getDestinationDirectory()
    {
        return dirname($this->getDestinationFile());
    }

    /**
     * @param  $width  
     * @param  $height 
     * 
     * @return $this         
     */
    public function resize($width, $height)
    {
        $this->image = $this->image->resize($width, $height);

        return $this;
    }

    /**
     * @param  $width  
     * @param  $height 
     * @param  $x       optional x offset 
     * @param  $y       optional y offset
     * 
     * @return $this
     */
    public function crop($width, $height, $x = false, $y = false)
    {
        if ($x && $y) {
            $this->image = $this->image->crop($width, $height, $x, $y);
        } else {
            $this->image = $this->image->crop($width, $height);
        }

        return $this;
    }

    /**
     * @param null $path
     *
     * @return mixed
     */
    public function save($path = null)
    {
        if (!is_null($path)) {
            $this->path = $path;
        }

        if (!is_dir($path = $this->getDestinationDirectory())) {
            File::makeDirectory($path, 0777, true);
        }

        $this->image->save($this->getDestinationFile());

        return $this->filename;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }
}
