<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	private $path;
    public function __construct(){
    	$path = 'frontend';
    	$this->path = $path;
    }

    public function index(){
    	return view($this->path . '.index-1');
    }
}
