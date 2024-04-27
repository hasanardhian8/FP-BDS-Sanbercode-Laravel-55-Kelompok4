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

                    <ul class="list-group">
                        @foreach ($post as $post)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5>{{ $post->post_content }}</h5>
                                        <p>Posted by: {{ $post->user->first_name }}</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('comment.create', $post->id) }}"
                                            class="btn btn-info">Comments</a>
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
