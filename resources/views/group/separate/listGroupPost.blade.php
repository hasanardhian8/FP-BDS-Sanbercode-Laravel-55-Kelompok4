@foreach ($posts as $post)
    <div class="container my-5 py-5 text-dark">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-body p-4">
                        <h1>Group {{ $post->group->group_name }}</h1>
                        <h1>{{ $post->group->description }}</h1>
                        <h1>{{ $post->post_content }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
