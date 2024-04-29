<div class="card m-2" style="min-width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Add Group</h5>
        <form action="{{ route('group.add') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="group_name" class="form-control" placeholder="Group Name">
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">
                    Send <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-send ms-1" viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
