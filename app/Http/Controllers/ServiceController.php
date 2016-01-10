<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Service;

class ServiceController extends Controller
{
	private $services = Service::orderBy('sort_order')->get();

	public function stuzkova()
	{
		
	}
}
