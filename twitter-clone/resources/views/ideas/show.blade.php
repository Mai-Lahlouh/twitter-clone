@extends('layout.layout')

@section('content')
    <div class="row">
        @include('shared.left-sidebar')
        <div class="col-6">
            @include('shared.success-alert')
            <div class="mt-3">
                <div class="card">
                    <div class="px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                                <div>
                                    <h5 class="card-title mb-0"><a href="#"> Mario
                                        </a></h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('idea.edit', $idea->id) }}" method="get">
                                    <button class="btn btn-sm bg-primary me-2" style="color:aliceblue ">Edit</button>
                                </form>
                                <form action="{{ route('idea.destroy', $idea->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm bg-danger">X</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($editing ?? false)
                            <form action="{{ route('idea.update', $idea->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                                    @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-space-between">
                                    <button class="btn btn-success me-2"> save </button>
                                    <a class="btn btn-dark" href="{{ route('idea.show', $idea->id) }}"> cancle </a>
                                </div>
                            </form>
                        @else
                            <p class="fs-6 fw-light text-muted">
                                {{ $idea->content }}
                            </p>
                        @endif
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                                    </span> {{ $idea->likes }} </a>
                            </div>
                            <div>
                                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                    {{ $idea->created_at }} </span>
                            </div>
                        </div>
                        @include('shared.comment')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('shared.follower-sidebar')
        </div>
    </div>
@endsection
