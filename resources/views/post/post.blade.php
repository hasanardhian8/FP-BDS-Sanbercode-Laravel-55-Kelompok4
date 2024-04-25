<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1cak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>

                <form action="{{ route('profile.show', ['id' => auth()->id()]) }}" method="GET" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary">Profile</button>
                </form>
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- <div class="container">
        <h1>Welcome, {{ $post->first_name }}</h1>
    </div> --}}
    <center>
        <div class="container">
            <p>
                The form below contains a textarea for
                posting:
            </p>

            {{-- <form action="{{ route('post.create') }}" method="POST"> --}}
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" rows="6" id="post_content" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>

    {{-- @foreach ($post as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->user->first_name }} {{ $post->user->last_name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">{{ $post->content }}</p>
                <a href="#" class="card-link">Comment</a>
                <a href="#" class="card-link">Like</a>
            </div>
        </div>
    @endforeach --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
