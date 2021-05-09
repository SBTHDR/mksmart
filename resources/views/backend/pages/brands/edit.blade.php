@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.partials.messages')
            <div class="card p-5">
                <div class="card-header">
                    Edit Brand
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="name" class="form-label">Brand Name</label>
                          <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $brand->name }}">
                      </div>

                      <div class="mb-3">
                          <label for="description" class="form-label">Brand Description</label>
                          <textarea name="description" id="description" class="form-control">{{ $brand->description }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label for="currentimage" class="form-label">Brand Current Image</label>
                          <div>
                            <img src="{{ asset('images/brands/' . $brand->image) }}" width="100">
                          </div>
                          <label for="image" class="form-label">New Brand Image</label>
                          <div>
                              <input type="file" name="image" class="border border-secondary p-2 w-100" id="image" aria-describedby="emailHelp">
                          </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Update Brand</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
