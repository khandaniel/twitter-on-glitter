<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function uploadData(Request $request, \App\User $user)
    {
        $request->validate([
            'name' => 'required|max:32|min:2',
            'email' => 'required'
        ]);
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect(action('HomeController@index'));
    }
    public function uploadImage(Request $request)
    {
        $request->validate([
            'avatar'=>'max:250|image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $imageName = 'image_'.$request->user()->id.'.jpg';
        $path = $request->file('avatar')->storeAs('avatars', $imageName);
        return view('home');
    }
}
