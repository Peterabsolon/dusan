<?php

namespace App\Composers\Admin;

class LayoutFormComposer
{
    public function compose($view)
    {
        $layout = config('admin.views.layout', 'admin::layouts.master');

        $view->with(compact('layout'));
    }
}
