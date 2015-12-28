<?php

namespace App\Validation\Admin\Service;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{
    protected $rules = [
        'title' => 'required',
        'slug' => 'required|unique:articles,slug',
        'body' => 'required'
    ];

    public function rules()
    {
        if (isOnPages()) {
            unset($this->rules['image']);
        }

        return $this->rules;
    }
}
