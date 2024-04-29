@foreach ($groups as $group)
    <div class="card m-2" style="min-width: 18rem;">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title">{{ $group->group_name }}</h5>
                <p class="card-text">{{ $group->description }}</p>
            </div>
            <div class="text-center">
                <a href="{{ route('group.show', $group->id) }}" class="btn btn-info">Join</a>
            </div>
        </div>
    </div>
@endforeach
