<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Service;
use App\Entities\Option;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

    	$data = array(
            // This is hardcoded because the user can't create or delete services, we only have 3 of them
    		'stuzkova'      => $services[0], 
            'svadba'        => $services[1],
            'udalost'       => $services[2], 
            'email'         => Option::where('key', 'contact.email')->first()->value,
            'phone'         => Option::where('key', 'contact.phone')->first()->value,
            'site_title'    => Option::where('key', 'site.title')->first()->value,
            'site_name'     => Option::where('key', 'site.name')->first()->value           
    	);

    	return view('home', $data);
    }
}
