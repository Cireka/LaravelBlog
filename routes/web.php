<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // we get files from posts folder
    $posts = Post::all();


    return view('posts', [
        'posts' => $posts
    ]);
});

// $postId is type of Post Model
// on default laravel uses Id To find specific post
// we can specify specific field that we want to find post with
// this is done with using : and then typing table field name in this case "slug"
Route::get('posts/{post:slug}', function (Post $post) { // Post::Where('slug', $post)->first();
    return view('post', [
        'post' =>$post
    ]);

});
