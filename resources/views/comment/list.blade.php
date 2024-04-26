<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comment</title>
</head>

<body>
    <h1>comment</h1>
    <div class="container">
        <p>
            The form below contains a textarea for
            posting:
        </p>
        @foreach ($comments as $comment)
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $comment->post->id }}">
                <h1>{{ $comment->post->id }}</h1 <div class="form-group">
                <textarea class="form-control" rows="6" id="comment_content" name="comment_content"></textarea>
                @error('comment_content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">comments</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @foreach ($comments as $comments)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5>{{ $comments->comments_content }}</h5>
                                            <p>commentsed by: {{ $comments->user->first_name }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('comments.show', $comments->id) }}"
                                                class="btn btn-primary">View</a>
                                            <a href="{{ route('comments.edit', $comments->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('comments.destroy', $comments->id) }}"
                                                method="comments" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
