<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $user->getUrl() }}"
                    alt="Mario Avatar">
                <div class="me-2">
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">@ {{ $user->name }}</span>
                </div>
            </div>
            @auth()
                @can('update',$user)
                    <a class="btn btn-sm btn-primary" style="height: 50%"
                        href="{{ route('users.edit', $user->id) }}">Edit</a>
                @endif
            @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span>{{$user->followers()->count()}} Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->ideas()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $user->likes()->count() }} </a>
            </div>
            @auth()
                @if (Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit"> unFollow </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                @csrf
                                <button class="btn btn-success btn-sm" type="submit"> Follow </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
