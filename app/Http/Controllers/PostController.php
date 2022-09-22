<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //dd(request(['search']));

        return view('posts.index', [
            'posts'             => Post::latest()
            ->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()

            //'currentCategory'   => Category::where('slug', request('category')->first())
            
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);   
    }

   

}
