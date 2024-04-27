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
                The form below contains a textarea for
                posting:
            </p>

            <form action="{{ route('post.update', ['postId' => $post->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <textarea class="form-control" rows="6" id="post_content" name="post_content" value="">{{ old('post_content', $post->post_content) }}</textarea>
                    @error('post_content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>

</body>

</html>
