<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function add(Product $product, Request $request){
//        $lead = Lead::where('email',$request->email)->first();
//        if (!$lead){
//            $lead = new Lead();
//            $lead->name = $request->name;
//            $lead->email = $request->email;
//            $lead->save();
//        }
//        $comment = Comment::where('title',$request->comment)->first();
//        if(!$comment){
//            $comment = new Comment();
//            $comment->lead_id = $lead->id;
//            $comment->product_id = $product->id;
//            $comment->title = $request->comment;
//            $comment->save();
//        }
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->product_id = $product->id;
        $comment->title = $request->comment;
        $comment->save();
        return back();
    }
}
