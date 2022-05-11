<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CommentController extends Controller
{
    public function storeComment(Request $request){

        //backend validation 
        //makes the fields required and store data only the 
        $validator = Validator::make($request->all(),[
            'comment_body' =>'required',
        ]);

        if($validator->fails()){
            return back()->with('status','Something went Wrong!');
        }else{

            Comment::create([
                'user_id' => auth()->user()->id,
                'post_id' => $request->post_id,
                'comment_body' => $request->comment_body,
    
    
            ]);
    
            return Redirect(route('welcome'));

        }
    }


    public function showComment($postId){

        //get the comments based on the post id 
        $comments = Comment::get()->where('post_id',$postId)->sortByDesc("created_at");

        return view('posts.comment',compact('comments'));

    }

}
