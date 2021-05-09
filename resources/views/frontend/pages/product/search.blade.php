@extends('frontend.layouts.app')

@section('content')

    <div class="container vh-100">
        <div class="row">
            {{-- <div class="col-md-4">
                @include('frontend.partials.product-sidebar')
            </div> --}}
            <div class="col-md-12">
                <div class="widget mt-5 text-center">
                    <h3>Search for keyword "{{ $search }}"</h3>
                    <div class="row">
                        @include('frontend.pages.product.partials.all_products')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
