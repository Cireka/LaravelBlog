<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="max-w-2xl m-auto">
<?php foreach ($posts as $post) : ?>
<article>
    <h1><a href="/posts/<?= $post->slug; ?>"><?= $post->title; ?></a></h1>
    <div>
        <p><?= $post->excerpt; ?></p>
    </div>
</article>
<?php endforeach; ?>
</body>
</html>
