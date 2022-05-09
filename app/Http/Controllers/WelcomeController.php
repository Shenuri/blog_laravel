<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function index() {

        //get all the data as an array from post table
        $posts = Post::all();

        //pass data to view using compact() function
        return view('welcome',compact('posts'));
        
    }
}
