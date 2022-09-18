<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

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

    public function create()
    {   
        // if (auth()->guest()) {
        //     abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        // }

        // if (auth()->user()->username != 'ivanl') {
        //     abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        // }


        return view('posts.create', [

        ]);   
    }

}
