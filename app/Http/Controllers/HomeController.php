<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cache;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users =  User::where('id','!=',Auth::user()->id)
        ->get();
        $users->makeHidden(['email_verified_at','created_at','updated_at','email']);
        $posts =  Post::latest()->get();
        return view('home',[
            'users' => $users,
            'posts' => $posts
        ]);
    }
    public function store(){
        $post= Post::create(request()->validate([
            'post' => 'required',
            'user_id' => 'required'
        ]));
        return $post;
    }
    public function ajaxGet(){
        $posts = Post::latest()->get();
        $posts = json_encode($posts);
        return $posts;
    }
    public function show(){
        $users =  User::where('id','!=',Auth::user()->id)
        ->get();
        $users->makeHidden(['email_verified_at','created_at','updated_at','email']);
        $posts =  Post::latest()->get();
        return view('profile',[
            'users' => $users,
            'posts' => $posts
        ]);
    }
    public function save(Request $request){
        if($request->hasFile('dp')){
            $a = $request->dp->store('images','public');
            dd($a);
            return 'uploaded ';

        }
    }
}
