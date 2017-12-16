<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['posts' => Tweet::orderBy('id', 'DESC')->simplePaginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['post' => 'required|max:300|min:1']);
        $newPost = new Tweet();
        $newPost->post = $request->input('post');
        $newPost->user_id = \Auth::user()->id;
        $newPost->reply_to = (null !== ($request->input('reply'))) ? $request->input('reply') : 0;
        $newPost->save();
        return redirect(action('TweetController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tweet $post
     * @return \Illuminate\Http\Response
     */

    public function show(Tweet $post)
    {
        return view('single.post', ['posts'=>$post]);
    }

    public function showById($id)
    {
        return view('index', ['posts' => Tweet::where('id', $id)->get()]);
    }

    public function showByUserId($id)
    {
        return view('index', ['posts' => Tweet::where('user_id', $id)->orderBy('id', 'DESC')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tweet $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $post)
    {
        return view('single.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tweet $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $post)
    {
        $request->validate([
            'post' => 'required|max:255|min:5'
        ]);
        if($post->user_id != \Auth::id()) {
            $post = new Tweet();
        }
        $post->user_id = \Auth::id();
        $post->post = $request->input('post');
        $post->reply_to = 0;
        $post->save();
        return redirect(action('TweetController@showById', $post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function repost(Tweet $post)
    {
        $new_repost = new Tweet();
        $new_repost->post = $post->post;
        $new_repost->user_id = \Auth::user()->id;
        $new_repost->reply_to = 0;
        $new_repost->save();

        return redirect(action('TweetController@show', $new_repost));


    }

    public function reply($post_id)
    {
        $new_reply_post = new Tweet();
        $new_reply_post->post = Tweet::where('id', $post_id);
    }
}
