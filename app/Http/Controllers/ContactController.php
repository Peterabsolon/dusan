<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Option;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
	public function index()
	{
		$data = array(
			'email'			=> Option::where('key', 'contact.email')->first()->value,
			'phone'			=> Option::where('key', 'contact.phone')->first()->value,
            'site_title'    => Option::where('key', 'site.title')->first()->value,
            'site_name'     => Option::where('key', 'site.name')->first()->value
		);

		return view('contact', $data);
	}

    /**
     * Submits contact form
     * 
     * @return void
     */
    public function send(ContactFormRequest $request)
    {
        \Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'title' => $request->get('title'),
                'phone' => $request->get('phone'),
                'body' => $request->get('body')
            ), function($message)
        {
            $message->from('info@dusankrajcovic.sk');
            $message->to('info@dusankrajcovic.sk', 'Admin')->subject('Contact form message');
        });

        return \Redirect::route('kontakt')
            ->with('message', 'Ďakujeme, Vaša správa bola úspešne odoslaná!');
    }	
}
