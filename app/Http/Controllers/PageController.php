<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
class PageController extends Controller
{
    public function index(){
        //eklenen verileri anasayfaya gönderme işlemi
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(6);
        return view('welcome', compact('posts'));
    }

    public function show($slug) {
        $post = Post::where('slug',$slug)->first();
        return view('post-show', compact('post'));

    }
}