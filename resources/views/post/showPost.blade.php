<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h5>{{ $post->post_content }}</h5>
    <p>Posted by: {{ $post->user->first_name }}</p>
</body>

</html>
