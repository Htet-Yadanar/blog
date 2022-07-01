<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function comment(Request $request)
    {
        
        $comment = new Comment;
        $comment->comment = request()->comment;
        $comment->post_id = request()->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        //dd($comment);
        return back();
    }
    public function delete($id)
    {
            $comment = Comment::find($id);
            if( Gate::allows('comment-delete', $comment) ) {
                $comment->delete();
                return back();
                }
            else {
                return back()->with('error', 'Unauthorize');
                }
    }
}
