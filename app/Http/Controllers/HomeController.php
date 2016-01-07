<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */	
    public function index()
    {
    	$data = array(
    		'services' => Service::orderBy('sort_order')->get()
    	);

    	return view('home', $data);
    }
}
