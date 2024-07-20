<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::when(request('keyword'),function($q){
            $keyword  = request('keyword');
            $q->orWhere('title','like',"%$keyword%")
            ->orWhere('description','like',"%$keyword%");
        })->latest("id")->paginate(10)->withQueryString();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, '...');
        $post->user_id = Auth::id();
        $post->category_id = $request->category;

        if ($request->hasFile('featured_image')) {
            $newName = uniqid() . "_featured-img." . $request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs("public", $newName);
            $post->featured_image = $newName;
        }
        $post->save();
        return redirect()->route('post.index')->with(['status' => 'Post created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, '...');
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->hasFile('featured_image')) {
            //delete old photo
            Storage::delete("public/" . $post->featured_image);
            //upload and update new photo
            $newName = uniqid() . '_featured_image.' . $request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs("public", $newName);
            $post->featured_image = $newName;
        }
        $post->update();
        return redirect()->route('post.index')->with(['status' => 'Post updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $postTitle = $post->title;
        if(isset($post->featured_image)){
            Storage::delete('public/'.$post->featured_image);
        }
        $post->delete();
        return redirect()->route('post.index')->with(['status' => "$postTitle deleted successfully"]);

    }
}
