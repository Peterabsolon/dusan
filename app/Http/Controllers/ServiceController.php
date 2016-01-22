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
    protected $services; 
    protected $email;
    protected $phone;

    public function __construct() 
    {
        $this->services = Service::orderBy('sort_order')->get();

		$this->email = Option::where('key', 'contact.email')->first()->value;
        $this->phone = Option::where('key', 'contact.phone')->first()->value;        
    }

	public function stuzkova()
	{
		$service = $this->services[0];

		$data = array(
			'service' 	=> $service,
			'email'		=> $this->email,
			'phone'		=> $this->phone
		);

		return view('service', $data);
	}

	public function svadba()
	{
		$service = $this->services[1];

		$data = array(
			'service' 	=> $service,
			'email'		=> $this->email,
			'phone'		=> $this->phone
		);

		return view('service', $data);
	}

	public function udalost()
	{
		$service = $this->services[2];

		$data = array(
			'service' 	=> $service,
			'email'		=> $this->email,
			'phone'		=> $this->phone
		);

		return view('service', $data);
	}		
}
