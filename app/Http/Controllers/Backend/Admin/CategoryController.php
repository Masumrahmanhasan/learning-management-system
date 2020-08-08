<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('backend.categories.index');
    }

    public function create()
    {
    	return view('backend.categories.create');
    }
}
