@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.partials.messages')
            <div class="card p-5">
                <div class="card-header">
                    Create Brand
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Brand Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Brand Image</label>
                            <div>
                                <input type="file" name="image" class="border border-secondary p-2 w-100" id="image" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
