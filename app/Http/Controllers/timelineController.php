<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class timelineController extends Controller
{
    public function index(){
    	Session::put('sayfa',5);
    	return view('timeline');
    }
}
