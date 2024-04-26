<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>berhasil</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($posts && $posts->count() > 0)
                            <ul class="list-group">
                                @foreach ($posts as $post)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5>{{ $post->post_content }}</h5>
                                                <p>Posted by: {{ $post->user->name }}</p>
                                            </div>
                                            <div>
                                                <a href="{{ route('post.show', $post->id) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-secondary">Edit</a>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="POST"
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
                        @else
                            <p>No posts found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
