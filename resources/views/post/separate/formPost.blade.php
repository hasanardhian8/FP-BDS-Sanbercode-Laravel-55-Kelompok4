<div class="container py-5 text-dark">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4 shadow">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar" width="65"
                            height="65" />
                        <div class="w-100">
                            <form action="{{ route('post.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div data-mdb-input-init class="form-outline">
                                        <textarea class="form-control" id="post_content" name="post_content" rows="4" placeholder="what' your opinion"></textarea>
                                    </div>
                                    <div class="d-flex flex-row-reverse mt-3 p-2">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-danger">
                                            Send
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
