<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="{{Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : ''}} nav-link text-dark" href="{{route('admin.dashboard')}}">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{Route::is('admin.users') ? 'text-white bg-primary rounded' : ''}} nav-link text-dark" href="{{route('admin.users')}}">
                        <span>Users</span></a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            <a class="{{Route::is('profile') ? 'text-white bg-primary rounded' : ''}} text-dark btn btn-link btn-sm" href="{{route('profile')}}">View Profile </a>
        </div>
    </div>
</div>
