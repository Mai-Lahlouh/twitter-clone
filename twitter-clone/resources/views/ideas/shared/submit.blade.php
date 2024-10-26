@auth()
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="idea" rows="3"></textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest()
    Login to share your ideas
@endguest
