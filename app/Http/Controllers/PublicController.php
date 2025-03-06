<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{

    //returning the welcome page 
    public function home()
    {
        return view('welcome');
    }
}
