<?php

namespace App\Validation\Admin\Service;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required|unique:articles,slug,'.Request::segment(3),
            'sort_order' => 'required',
        ];
    }
}
