<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>ini edit group</h1>
    <center>
        <div class="container">
            <p>
                The form below contains a textarea for
                posting:
            </p>

            <form action="{{ route('group.update', ['groupId' => $group->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="text" class="form-control" name="group_name">
                    <textarea class="form-control" rows="6" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>
</body>

</html>
