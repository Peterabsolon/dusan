<?php

View::composer('admin/services.form', 'App\Composers\Admin\ServiceFormComposer');
View::composer('admin/*', 'App\Composers\Admin\LayoutFormComposer');