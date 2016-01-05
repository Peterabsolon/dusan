<?php

namespace App\Presenters\Admin;

use Pingpong\Presenters\Presenter;

class Service extends Presenter
{
    public function image_path()
    {
        return public_path("images/services/{$this->entity->image}");
    }
}
