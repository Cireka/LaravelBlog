<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    // by default, we were fetching all the posts and their connected relationships one by one using different queries
    // by this method laravel fetches all Post models along with their associated Category models in a single query.
    $posts = Post::latest()->with('category','author')->get();


    return view('posts', [
        'posts' => $posts
    ]);
});

// $postId is type of Post Model
// on default laravel uses I'd To find specific post
// we can specify specific field that we want to find post with
// this is done with using : and then typing table field name in this case "slug"
Route::get('posts/{post:slug}', function (Post $post) { // Post::Where('slug', $post)->first();
    return view('post', [
        'post' =>$post
    ]);

});


// trying to find Category which is class by using its slug
// if slug in the router and slug in the Category table match we get successful route
//$category and {category:slug} need to match in terms of naming
Route::get('categories/{category:slug}', function (Category $category) { // Post::Where('slug', $post)->first();
    $categoryPosts = $category->posts->load(['category','author']);
    return view('posts', [
        'posts' =>$categoryPosts
    ]);

});

Route::get('authors/{author:username}', function (User $author) {

    // code below is same as Post::Where('slug', $post)->first(); but because of different syntax we cant use
    // with() method instead we use load method here
   $userPost = $author->post->load(['category','author']);
    return view('posts', [
        'posts' => $userPost
    ]);

});
