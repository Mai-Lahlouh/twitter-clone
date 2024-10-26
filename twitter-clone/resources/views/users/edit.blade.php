@extends('layout.layout')

@section('content')
    <div class="row">
        @include('shared.left-sidebar')
        <div class="col-6">
            @include('shared.success-alert')
            <div class="mt-3">
                @include('shared.user-edit')
            </div>
        </div>
        <div class="col-3">
            @include('shared.follower-sidebar')
        </div>
    </div>
@endsection
