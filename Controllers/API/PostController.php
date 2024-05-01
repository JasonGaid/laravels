<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        ]);
    
        try {
            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images');
                // Modify the image path format
                $imagePath = 'images/' . $imagePath;
            }

            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            $post->image = $imagePath; // Save modified image path
            $post->save();
    
            // Return success response
            return response()->json(['message' => 'Post created successfully'], 201);
        } catch (\Exception $e) {
            // Return error response if something went wrong
            return response()->json(['message' => 'Failed to create post', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function index()
    {
        $posts = Post::with('user')->latest()->get(); // Fetch posts in descending order of creation
        return response()->json($posts);
    }

   // PostController - update Method
public function update(Request $request, Post $post)
{
    // Validate request data
    $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'category_id' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
    ]);

    try {
        // Handle image upload
        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
            // Modify the image path format
            $imagePath = 'images/' . $imagePath;
        }

        // Update post data
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath, // Save modified image path
        ]);

        // Return success response
        return response()->json(['message' => 'Post updated successfully'], 200);
    } catch (\Exception $e) {
        // Return error response if something went wrong
        return response()->json(['message' => 'Failed to update post', 'error' => $e->getMessage()], 500);
    }
}

    
}
