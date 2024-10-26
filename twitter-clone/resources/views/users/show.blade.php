@extends('layout.layout')

@section('content')
    <div class="row">
        @include('shared.left-sidebar')
        <div class="col-6">
            @include('shared.success-alert')
            <div class="mt-3">
                @include('shared.user-card')
            </div>
            <div class="mt-3">
                @forelse ($ideas as $idea)
                    <div class="card mt-3">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:40px" class="me-2 avatar-sm rounded-circle"
                                        src="{{$idea->user->getUrl()}}"
                                        alt="{{ $idea->user->name }} Avatar">
                                    <div>
                                        <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user_id) }}">
                                                {{ $idea->user->name }}
                                            </a></h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    @if (Auth::id() == $idea->user_id)
                                        <form action="{{ route('ideas.edit', $idea->id) }}" method="get">
                                            <button class="btn btn-sm bg-primary me-2"
                                                style="color:aliceblue ">Edit</button>
                                        </form>
                                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm bg-danger">X</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($editing ?? false)
                                <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <button class="btn btn-dark"> save </button>
                                    </div>
                                </form>
                            @else
                                <p class="fs-6 fw-light text-muted">
                                    {{ $idea->content }}
                                </p>
                            @endif
                            <div class="d-flex justify-content-between">
                                @include('ideas.shared.like')
                                <div>
                                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                        {{ $idea->created_at }} </span>
                                </div>
                            </div>
                            @include('shared.comment')
                        </div>
                    </div>
                @empty
                    <div class="text-center my-3">No Results Found</div>
                @endforelse
                <div class="mt-3">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
