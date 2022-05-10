<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request){

        //backend validation 
        //makes the fields required and store data only the 
        $validator = Validator::make($request->all(),[
            'title' =>'required',
            'description' => 'required',
            'thumbnail' => 'required|image'
        ]);

        if($validator->fails()){
            return back()->with('status','Something went Wrong!');
        }else{

            //rename the image name to time+extension so by doing this we can upload the same image as many time cause the name is different  
            $imageName= time() . "." .$request->thumbnail->extension();

            //creats a folder to store the images
            $request->thumbnail->move(public_path('thumbnails'), $imageName);

            Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail' => $imageName
    
    
            ]);
    
            return redirect(route('posts.all'))->with('status','Thank you for creating a new post!');

        }


        

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

        $validator = Validator::make($request->all(),[
            'title' =>'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return back()->with('status','Something went Wrong!');
        }else{

        Post::findOrFail($postId)->update($request->all());

        return redirect(route('posts.all'))->with('status','Post Updated Successfully!');

        }
    }


    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'))->with('status', 'Post Deleted!');

    }
}