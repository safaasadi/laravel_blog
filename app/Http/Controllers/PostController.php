<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost(Request $request) {
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->author_id = auth()->user()->id;
        $post->save();
        return redirect('/home')->with('alert', 'Post created successfully!');
    }

    public function deletePost(Request $request) {
        // making sure the post with the ID exists in our database
        if (! Post::where('id', $request['id'])->exists()) {
            return redirect('/home')->with('alert', 'Post not found.');
        }

        // grab the post from the database with the ID
        $post = Post::where('id', $request['id'])->first();

        // someone is trying to delete the post that is not theirs
        if ($post->author_id !== auth()->user()->id) {
            return redirect('/home')->with('alert', 'You are not the author if that post.');
        }

        // this is their post, and the post exists... DELETE IT 
        $post->delete();
        return redirect('/home')->with('alert', 'Post deleted.');
    }

    public function getPost(Request $request) {
        // if post does not exist redirect to home with alert
        if(! Post::where('id', $request['id'])->exists()){
            return redirect('/home')->with('alert', 'Post not found.');
        }

        // grabs the post from database with ID
        $post = Post::where('id', $request['id'])->first();

        // returns the view of post blade file
        return view('post')->with('post', $post);
    }
}
