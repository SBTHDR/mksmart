@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.partials.messages')
            <div class="card p-5">
                <div class="card-header">
                    Create Product
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                          <label for="Category">Select a Category</label>
                          <select class="form-control" name="category_id">
                            <option value="">Please select a product category type</option>
                            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                              <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                              @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                                <option value="{{ $child->id }}"> > {{ $child->name }}</option>
                              @endforeach
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="Category">Select a Brand</label>
                          <select class="form-control" name="brand_id">
                            <option value="">Please select a product brand</option>
                            @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <div>
                                <input type="file" name="product_image" class="border border-secondary p-2 w-100" id="quantity" aria-describedby="emailHelp">
                            </div>

                            {{--                        <div class="row">--}}
                            {{--                            <div class="col-md-4 mb-2">--}}
                            {{--                                <input type="file" name="product_image[]" class="border border-secondary p-2" id="quantity" aria-describedby="emailHelp">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-2">--}}
                            {{--                                <input type="file" name="product_image[]" class="border border-secondary p-2" id="quantity" aria-describedby="emailHelp">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-2">--}}
                            {{--                                <input type="file" name="product_image[]" class="border border-secondary p-2" id="quantity" aria-describedby="emailHelp">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-2">--}}
                            {{--                                <input type="file" name="product_image[]" class="border border-secondary p-2" id="quantity" aria-describedby="emailHelp">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-2">--}}
                            {{--                                <input type="file" name="product_image[]" class="border border-secondary p-2" id="quantity" aria-describedby="emailHelp">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-2">--}}
                            {{--                                <input type="file" name="product_image[]" class="border border-secondary p-2" id="quantity" aria-describedby="emailHelp">--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}

                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
