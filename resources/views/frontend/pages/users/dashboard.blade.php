@extends('frontend.pages.users.master')

@section('dashboard-content')
    <div class="container">
        <h2>Welcome to your Dashboard <span class="text-warning">{{ $user->first_name . ' ' . $user->first_name }}</span> </h2>
        <p>You can manage your profile here.</p>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-body" onclick="location.href='{{ route('user.profile') }}'" style="cursor: pointer">
                        <h6>Update your profile</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
