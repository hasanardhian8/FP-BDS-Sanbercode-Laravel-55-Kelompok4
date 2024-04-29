<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comment</title>
</head>

<body>
    <h1>list comment</h1>
    <a href="{{ route('post.index') }}" class="btn btn-info">post Comments</a>

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
                                            <h5>{{ $comments->comment_content }}</h5>
                                            <p>commentsed by: {{ $comments->user->first_name }}</p>
                                        </div>
                                        <div>
                                            {{-- <a href="{{ route('comments.show', $comments->id) }}"
                                                class="btn btn-primary">View</a> --}}
                                            <a href="{{ route('comment.edit', $comments->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('comment.destroy', $comments->id) }}" method="POST"
                                                style="display: inline;">
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
