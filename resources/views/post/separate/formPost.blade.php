<div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-body p-4">
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
    </div>
