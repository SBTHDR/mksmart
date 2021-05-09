@extends('frontend.layouts.app')

@section('content')
    {{-- Start of Navbar --}}

    {{-- End of Navbar --}}

    {{-- Start Sidebar and Content --}}
    <div class="container vh-100">

        @include('frontend.partials.search-bar')
        
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.product-sidebar')
            </div>
            <div class="col-md-8">
                <div class="widget mt-5">
                    {{-- <h3>All Products</h3> --}}
                    <div class="row">

                        @include('frontend.pages.product.partials.all_products')

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Sidebar and Content --}}

    {{-- Start Footer --}}

    {{-- End Footer --}}
@endsection
