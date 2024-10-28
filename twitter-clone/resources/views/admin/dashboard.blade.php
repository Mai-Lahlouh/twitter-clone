@extends('layout.layout')

@section('content')
    <div class="row">
        @include('admin.shared.left-sidebar')
        <div class="col-9">

            <h1>Admin Dashboard</h1>
            <div class="row">

                <div class="col-sm-6 col-md-4 mt-2">
                    @include('admin.shared.widget', [
                        'title' => 'Total Users',
                        'icon' => 'fas fa-users',
                        'data' => $totalUsers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4 mt-2">
                    @include('admin.shared.widget', [
                        'title' => 'Total Ideas',
                        'icon' => 'fas fa-lightbulb',
                        'data' => $totalIdeas,
                    ])
                </div>
                <div class="col-sm-6 col-md-4 mt-2">
                    @include('admin.shared.widget', [
                        'title' => 'Total Comments',
                        'icon' => 'fas fa-comment',
                        'data' => $totalComments,
                    ])
                </div>
            </div>
        </div>
    </div>

@endsection
