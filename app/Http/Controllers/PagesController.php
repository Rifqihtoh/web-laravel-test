<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function portal()
    {
    	return view('index');
    }
    public function userHome()
    {
    	return view('userHome');
    }
    public function admHome()
    {
    	return view('adminHome');
    }
    public function orgHome()
    {
    	return view('orgHome');
    }
}
