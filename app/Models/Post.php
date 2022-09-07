<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Symfony\Component\VarDumper\VarDumper;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function find($slug)
    {
        // $posts = static::all();
        // //dd($posts->firstWhere('slug', $slug));
        // return $posts->firstWhere('slug', $slug)->body;
        $post = static::all()->firstWhere('slug', $slug);
        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function (){
            return collect(File::files(resource_path("posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn ($document) => new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    ))
                ->sortByDesc('date');
        });
    }
}