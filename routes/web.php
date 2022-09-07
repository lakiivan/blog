<?php

use App\Models\Post;
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
    $posts = Post::all();

    //ddd($posts[0]->slug);
    return view('posts', [
        'posts' => $posts 
    ]);
});

Route::get('posts/{post}', function($slug) {
    // REFACTORING BIG AND UGLY FIRST VERSION OF WORKING ROUTE
    //find a post by its slug and pass it to view called "post"
    $post  = Post::find($slug);

    //dd($post);
    return view('post', [
        'post' => Post::find($slug)
    ]);

});
