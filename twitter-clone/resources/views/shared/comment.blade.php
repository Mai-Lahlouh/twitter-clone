<div>
    <form action="{{ route('ideas.comment.store', $idea->id) }}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
        </div>
    </form>
    @forelse ($idea->comments as $comment)
        <hr>
        <div class="d-flex align-items-start mt-2">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getUrl() }}"
                alt="Luigi Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h3 class="">{{ $comment->user->name }} </h3>
                    <small class="fs-6 fw-light text-muted">{{ $comment->created_at }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
    @endforelse
</div>
