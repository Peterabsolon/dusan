<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Option;
use App\Entities\Reference;

class ReferencesController extends Controller
{
	public function index()
	{
		$data = array(
			'references' 	=> Reference::orderBy('sort_order')->get(),
			'email'			=> Option::where('key', 'contact.email')->first()->value,
			'phone'			=> Option::where('key', 'contact.phone')->first()->value,
            'site_title'    => Option::where('key', 'site.title')->first()->value,
            'site_name'     => Option::where('key', 'site.name')->first()->value			
		);

		return view('references', $data);
	}
}
