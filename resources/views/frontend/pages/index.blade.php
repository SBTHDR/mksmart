@extends('frontend.layouts.app')

@section('content')

    <div class="container vh-100">

        @include('frontend.partials.search-bar')

        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.product-sidebar')
            </div>
            <div class="col-md-8">
                <div class="widget mt-5">
                    <h3>Featured Products</h3>
                    <div class="row">

                        @include('frontend.pages.product.partials.all_products')

                    </div>
                    <div class="paginate">
                      {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
