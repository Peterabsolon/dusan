<?php

namespace App\Presenters\Admin;

use Pingpong\Presenters\Presenter;

class Reference extends Presenter
{
    public function image_path()
    {
        return public_path("images/references/{$this->entity->image}");
    }
}
