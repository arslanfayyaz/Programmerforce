<!doctype html>

<title>
	My blog
</title>
<link rel="stylesheet" type="text/css" href="/app.css">
<script type="text/javascript" src="/app.js"></script>

<body>
    <?php foreach($posts as $post) : ?>
    <article>
        <h1><a href="/posts/<?= $post->id; ?>"><?=$post->title; ?> </a></h1>
        <a href="/categories/{{$post->category->slug}}"><?= $post->category->name; ?></a>
        <p><?=$post->body ?></p>
    </article>

    <?php endforeach; ?>
</body>