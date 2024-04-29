    @foreach ($groups as $group)
        <div class="col">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $group->group_name }}</h5>
                    <p class="card-text">{{ $group->description }}</p>
                    <a href="{{ route('group.show', $group->id) }}" class="btn btn-info">gabung</a>
                </div>
            </div>
        </div>
    @endforeach
