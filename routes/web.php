<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
//use \Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //DEBUGGING TOOLS    
    // \Illuminate\Support\Facades\DB::listen(function ($query) {
        //first approach
        // \Illuminate\Support\Facades\Log::info('foo');
        //second approceh with function logger
        //logger($query->sql, $query->bindings);
    // });

    //OLD way with n+1 problem 
    // $posts = Post::all();

    //new way qithout n+1 problem


    //ddd($posts[0]->slug);
    return view('posts', [
        'posts' => Post::with('category')->get()
    ]);
});

Route::get('posts/{post}', function(Post $post) { // Post::where('slug', $post) -> firstOrFail()
    //dd($post);
    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
