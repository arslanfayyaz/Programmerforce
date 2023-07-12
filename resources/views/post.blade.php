
<!DOCTYPE html>

<title>Post tab</title>

<body>
    <h1><?= $post; ?></h1>
    By <a href='#'><?=$user; ?></a> in: <a href="/categories/{{$category}}"><?=$category; ?></a>
    <p><?=$body; ?></p>
    
    <a href='/'>Route back</a>

</body>