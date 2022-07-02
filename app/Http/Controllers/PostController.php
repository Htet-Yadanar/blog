<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth')->except(['index', 'detail']);
    }
    

    public function index()
    {
        $data = Post::latest()->paginate(6);
        return view('blog.bloglist',compact('data'));
    }
    public function mypost(){
        $data = Post::where('user_id', '=',Auth::user()->id)->paginate(6);
        //dd($data);
        return view('blog.myblog',compact('data'));
    }
    public function add()
    {
        return view('blog.create');
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $post = new post;
        $post->title = request()->title;
        $post->body = request()->body;
        $post->user_id = auth()->user()->id;
        $post->save();
        // dd($post);
        return redirect('/post/list')->with('success', 'Post Created');
    }
    public function detail($id)
    {
        return view('blog.detail', [
            'post' => Post::findOrFail($id)
        ]);
    }
    public function edit($id)
    {
        return view('blog.edit',[
            'post' => Post::findOrFail($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update();
        return redirect('/post/list')->with('success', 'Post Updated');
    }

    public function delete($id)
    {
            $post = Post::find($id);
            if( Gate::allows('post-delete', $post) ) {
                $post->delete();
                return redirect('/post/list')->with('success', 'Post deleted');
                }
            else {
                return back()->with('error', 'Unauthorize');
                }

            // $post = Post::find($id);
            // $post->delete();
            // return redirect('/post/list')->with('success', 'Post deleted');
    }
}
