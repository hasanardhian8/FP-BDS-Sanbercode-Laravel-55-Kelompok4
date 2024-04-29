<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    @include('components.navbar')
    <h5>{{ $post->post_content }}</h5>
    <p>Posted by: {{ $post->user->first_name }}</p>
    @foreach ($comments as $comment)
        <div class="comment">
            <p>{{ $comment->comment_content }}</p>
            <small>Commented by {{ $comment->user->first_name }}</small>
        </div>
    @endforeach
    <form action="{{ route('comment.store', ['post' => $post->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="user_id" value="{{ $post->user_id }}">
            <textarea id="comment_content" name="comment_content" class="form-control" placeholder="Write a comment..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
