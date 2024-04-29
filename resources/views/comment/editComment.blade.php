<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="container">
            <p>
                ini edit
            </p>

            <form action="{{ route('comment.update', ['commentId' => $comment->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="post_id" value="{{ old('post_id', $comment->post_id) }}">
                <input type="hidden" name="user_id" value="{{ old('user_id', $comment->user_id) }}">
                <textarea id="comment_content" name="comment_content"
                    placeholder="{{ old('comment_content', $comment->comment_content) }}"></textarea>
                <button type="submit">Submit</button>
            </form>
            {{-- <a href="{{ route('comment.show', ['postId' => $post->id]) }}" class="btn btn-info">View Comments</a> --}}
            {{-- <a href="{{ route('comment.index') }}" class="btn btn-info">View Comments</a> --}}
        </div>
    </center>
</body>

</html>
