<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','desc')->paginate(20);
        //$posts = Post::latest()->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request){
        $request->validate([
            'body' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);
        return back();
    }

    public function destroy(Post $post){
        
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
