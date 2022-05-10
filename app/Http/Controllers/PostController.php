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

        return redirect(route('posts.all'));

    }

    public function show($postId){

        //get the post based on the post id 
        //findOrFail -> if there is not data it will generate an error page (not found page)
        $post= Post::findOrFail($postId);
        return view('posts.show',compact('post'));

    }


    public function edit($postId){
        $post = Post::findOrFail($postId);
        return view('posts.edit',compact('post'));
    }

    public function update($postId,Request $request){
        Post::findOrFail($postId)->update($request->all());

        return redirect(route('posts.all'));

    }


    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));

    }
}