<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function api_sender_id(){
		return view('pages.developer.api_sender_id');
	}
    public function api_docs(){
		return view('pages.developer.api_docs');
	}
}
