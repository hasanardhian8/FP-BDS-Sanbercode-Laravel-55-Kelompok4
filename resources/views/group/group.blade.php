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

    {{-- @include('group.separate.form') --}}



    <div class="row row-cols-4 row-cols-md-3 g-4">
        @include('group.separate.listGroup')

        <div class="col">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Add Group</h5>
                    <p class="card-text">
                    <form action="{{ route('group.add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="group_name">
                            <input type="textarea" name="description">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger">
                                Send
                                <i class="fas fa-long-arrow-alt-right ms-1"></i>
                            </button>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
