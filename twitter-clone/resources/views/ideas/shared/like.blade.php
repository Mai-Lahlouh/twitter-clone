@auth()
    @if (Auth::user()->likesIdea($idea))
        <div>
            <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span>{{ $idea->likes()->count() }}</button>
            </form>
        </div>
    @else
        <div>
            <form action="{{ route('ideas.like', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fs-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $idea->likes()->count() }}</button>
            </form>
        </div>
    @endif
@endauth
@guest()
    <div>
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                {{ $idea->likes()->count() }} </span> </a>
    </div>
@endguest
