<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('components.navbar')

    <div class="container my-5 py-5 text-dark">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('group.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" id="post_content" name="post_content" rows="4" placeholder="What's your opinion"></textarea>
                                <input type="hidden" id="group_id" name="group_id" value="{{ $group->id }}">
                                <div class="d-flex flex-row-reverse mt-3 p-2">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-danger">
                                        Send
                                        <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('group.separate.formGroup') --}}
    @include('group.separate.listGroupPost')

    {{-- <a href="{{ route('group.edit', $group->id) }}" class="btn btn-secondary">Edit</a> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
