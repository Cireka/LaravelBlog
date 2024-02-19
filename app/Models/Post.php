<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $body;
    public $title;
    public $excerpt;
    public $date;
    public $slug;

    public function __construct($body, $title, $excerpt, $date,$slug)
    {
        $this->body = $body;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        $posts = static::all();

       return $posts->firstWhere('slug',$slug);

    }
    public static function all(){

        // posts.all is key to for this specific cache we use it to access cached information through php artisan tinker
        return cache()->rememberForever('posts.all',fn() =>
        // File::files is laravel class that is helping us get all the files from this path
           collect(File::files(resource_path("/posts/")))
             // we map them over
             ->map(fn ($post)=>
                 // return each one of them in acceptable format using FrontMatter
             YamlFrontMatter::parseFile($post)
             // map each post and create new post object based on their params
             )->map(fn  ($document)=>
             new Post($document->body(),
                 $document->title,
                 $document->excerpt,
                 $document->date,
                 $document->slug
             ))->sortByDesc('date')
        );
    }

}
