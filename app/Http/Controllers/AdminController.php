<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.welcome');
    }


    public function listPosts()
    {
    	$posts = DB::table('posts') 
    				-> where('draft', 0) 
    				-> paginate(10);

    	return view('admin.posts', compact('posts'));
    }

    public function listDrafts()
    {
    	$posts = DB::table('posts') 
    				-> where('draft', 1) 
    				-> paginate(10);

    	return view('admin.posts', compact('posts'));
    }
}
