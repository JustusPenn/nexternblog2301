<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $blogs = Blog::orderBy('created_at', 'Desc')->where('user_id', auth()->id())->get();
        return view('dashboard', compact('blogs'));
    }
}
