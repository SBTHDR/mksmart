@extends('frontend.layouts.app')

@section('content')
    {{-- Start of Navbar --}}

    {{-- End of Navbar --}}

    {{-- Start Sidebar and Content --}}
    <div class="container vh-100">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.product-sidebar')
            </div>
            <div class="col-md-8">
                <div class="widget mt-5">
                    <h3>All Products for <span class="badge bg-warning">{{ $category->name }}</span> Category</h3>
                    <div class="row">

                      @php
                        $products = $category->products;
                      @endphp

                        @if ($products->count() > 0)
                          @include('frontend.pages.product.partials.all_products')
                        @else
                          <div class="alert alert-warning">
                            No products added yet for this category
                          </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Sidebar and Content --}}

    {{-- Start Footer --}}

    {{-- End Footer --}}
@endsection
