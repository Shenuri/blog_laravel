<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){
        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,


        ]);

        return back();

    }

    public function show($postId){

        //get the post based on the post id 
        //findOrFail -> if there is not data it will generate an error page (not found page)
        $post= Post::findOrFail($postId);
        return view('posts.show',compact('post'));

    }
}