<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Service;
use App\Entities\Option;

/**
 * Services are hardcoded because the user can't create or delete services, we only have 3 of them
 */
class ServiceController extends Controller
{
	public function stuzkova()
	{
		$services = Service::orderBy('sort_order')->get();

		$email  = Option::where('key', 'contact.email')->first()->value;
        $phone  = Option::where('key', 'contact.phone')->first()->value;

		$data = array(
			'service' 	=> $services[0],
			'email'		=> $email,
			'phone'		=> $phone
		);

		return view('service', $data);
	}

	public function svadba()
	{
		$services = Service::orderBy('sort_order')->get();

		$email  = Option::where('key', 'contact.email')->first()->value;
        $phone  = Option::where('key', 'contact.phone')->first()->value;

		$data = array(
			'service' 	=> $services[1],
			'email'		=> $email,
			'phone'		=> $phone
		);

		return view('service', $data);
	}

	public function udalost()
	{
		$services = Service::orderBy('sort_order')->get();

		$email  = Option::where('key', 'contact.email')->first()->value;
        $phone  = Option::where('key', 'contact.phone')->first()->value;

		$data = array(
			'service' 	=> $services[2],
			'email'		=> $email,
			'phone'		=> $phone
		);

		return view('service', $data);
	}		
}
