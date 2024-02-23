<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="max-w-2xl m-auto">
<article>
    <h1 class="font-bold text-[32px] underline italic text-emerald-900">  {{$post->title}} </h1>
    <div>
        <p class="text-[22px] text-blue-700">{{$post->body}}</p>
    </div>
</article>

<a class="text-[18px] font-bold" href="/">Go Back</a>
</body>
</html>
