<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
 
class PostController extends Controller
{
    public function index()
{
    $posts = Post::get(); // Retrieve 

    return view('post.index', ['posts' => $posts]);
}

public function delete($id)
{
    Post::destroy($id);
    return redirect()->route('post'); 
}
}