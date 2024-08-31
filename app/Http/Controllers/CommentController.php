<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
class CommentController extends Controller
{
    public function index(){

        $comment = Comment::all();
        $product = Product::all();
        return view('customers.comment', compact('comment','product'));
    }
    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            'productID' => 'required|exists:products,id',
            'name' => 'required',
            'email' => 'nullable|email',
            'content' => 'required',
        ]);

        Comment::create($validatedData);*/


        $cmt = new Comment();
        $cmt->id = $request->id;
        $cmt->productID = $request->productID;
        $cmt->name = $request->name;
        $cmt->email = $request->email;
        $cmt->content = $request->content;
        $cmt->save();

        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi!');
    }

    public function cmtDelete($id){
        $cmt = Comment::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }   
    public function cmtEdit($id){
        $cmt = Comment::where('id', '=', $id)->first();
        $product = Product::all();
        return view('customers/commentEdit', compact('cmt','product'));

    }

    public function cmtUpdate(Request $request){
        Comment::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'productID' => $request->productID,
            'email' => $request->email,
            'content'=> $request->content
        ]);
        return redirect()->back()->with('success', 'Comment update successfully!');

    }  
}
