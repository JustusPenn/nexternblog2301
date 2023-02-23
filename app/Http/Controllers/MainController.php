<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'Desc')->get();
        return view('index', compact('blogs'));
    }
}
