<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\Response;
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


        return view('posts.create');   
    }

    public function store()
    {
        //ddd(request()->all());
        
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

}
