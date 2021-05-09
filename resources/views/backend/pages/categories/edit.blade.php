@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.partials.messages')
            <div class="card p-5">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="name" class="form-label">Category Name</label>
                          <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $category->name }}">
                      </div>

                      <div class="mb-3">
                          <label for="description" class="form-label">Category Description</label>
                          <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label for="parent_id" class="form-label">Parent Category</label>
                          <select class="form-control" name="parent_id">
                              @foreach ($main_categories as $cat)
                                <option value="#">Please Select Primary Ctegory</option>
                                  <option value="{{ $cat->id }}" {{ $cat->id === $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="currentimage" class="form-label">Category Current Image</label>
                          <div>
                            <img src="{{ asset('images/categories/' . $category->image) }}" width="100">
                          </div>
                          <label for="image" class="form-label">New Category Image</label>
                          <div>
                              <input type="file" name="image" class="border border-secondary p-2 w-100" id="image" aria-describedby="emailHelp">
                          </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
