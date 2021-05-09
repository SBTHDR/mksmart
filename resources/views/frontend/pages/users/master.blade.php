@extends('frontend.layouts.app')

@section('content')
    <div class="container vh-100 mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="" class="list-group-item">
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" alt="" style="width: 100px">
                    </a>
                    <a href="{{ route('user.dashboard') }}" class="list-group-item {{ Route::is('user.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('user.profile') }}" class="list-group-item {{ Route::is('user.profile') ? 'active' : '' }}">Update Profile info</a>
                    <a href="{{ route('user.logout') }}" class="list-group-item {{ Route::is('user.logout') ? 'active' : '' }}">Logout</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @yield('dashboard-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
