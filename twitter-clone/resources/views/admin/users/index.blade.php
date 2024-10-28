@extends('layout.layout')

@section('content')
    <div class="row">
        @include('admin.shared.left-sidebar')
        <div class="col-9">
            <h1>Users</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Jonined at</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->toDateString()}}</td>
                        <td>
                            <a href="{{route('users.show',$user->id)}}">view</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{$users->links()}}</div>
        </div>
    </div>
@endsection
