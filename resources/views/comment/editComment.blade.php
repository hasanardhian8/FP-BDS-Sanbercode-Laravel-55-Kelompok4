<!-- Modal Trigger Button -->
<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $comment->id }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
        viewBox="0 0 16 16">
        <path
            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
    </svg>
</button>
<div class="modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="{{ route('comment.update', ['commentId' => $comment->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="post_id" value="{{ old('post_id', $comment->post_id) }}">
                    <input type="hidden" name="user_id" value="{{ old('user_id', $comment->user_id) }}">
                    <textarea id="comment_content" name="comment_content"
                        placeholder="{{ old('comment_content', $comment->comment_content) }}"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
