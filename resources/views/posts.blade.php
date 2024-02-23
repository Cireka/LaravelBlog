<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="max-w-2xl m-auto">
@foreach ($posts as $post)
<article>
    <h1 class="font-bold text-[32px] underline italic text-emerald-900"><a href="/posts/{{$post->slug}}"> {{$post->title}}</a></h1>
    <p class="text-fuchsia-800 font-bold" ><a href="/">{{$post->category->slug}}</a></p>
    <div>
        <p class="text-[22px] text-blue-700">{{$post->excerpt}}  </p>
    </div>
</article>
@endforeach
</body>
</html>
