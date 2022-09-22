<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        //dd(request(['search']));
        //dd(Gate::allows('admin'));
        //$this->authorize('admin');

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
