<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'Desc')->get();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|file|image',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image->store('uploads/blog', 'public'),
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('blog.show', $blog->id)->with('success', 'Article Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);


        if($request->image){
            $blog->update([
                'image' => $request->image->store('uploads/blog', 'public'),
            ]);
        }

        return redirect()->route('blog.show', $blog->id)->with('success', 'Article Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        foreach($blog->comments as $comment) {
            $comment->delete();
        }

        $blog->delete();
        return back();
    }
}
