<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (Post::all());
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {           

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'content' => 'required|string',
            'img' => 'nullable|string',
        ]);   

        $post = Post::create([
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'img' => $request->img,
        ]);        
        return response()->json(['message' => 'Post Created Successfully','post' => $post],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'title' => 'sometimes|string',
            'content' => 'sometimes|string',
            'img' => 'sometimes|string|nullable',
        ]);

        $post->update($request->all());

        return response()->json(['message' => 'Post updated successfully', 'post' => $post]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
