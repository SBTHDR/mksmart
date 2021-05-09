@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.partials.messages')
            <div class="card p-5">
                <div class="card-header">
                    Create Division
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Division Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">Division Priority</label>
                            <input type="text" name="priority" class="form-control" id="priority" aria-describedby="emailHelp">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Division</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
