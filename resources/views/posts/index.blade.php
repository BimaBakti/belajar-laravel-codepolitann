<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        .blog{
            padding: 5px;
            border-bottom: 1px solid lightgray;
        }
    </style>
</head>
<body>
    <h1>Ini Blog</h1>
<div>
    @foreach ($posts as $post)
        <div class="blog">
            <h3>{{ $post[0] }}</h3>
            <p>{{ $post[1] }}</p>
        </div>
    @endforeach
</div>   
</body>
</html>