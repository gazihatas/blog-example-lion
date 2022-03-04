<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
class PageController extends Controller
{
    public function index(){
        //eklenen verileri anasayfaya gönderme işlemi
        $posts = Post::orderBy('updated_at', 'DESC')->paginate();
        return view('welcome', compact('posts'));
    }
}