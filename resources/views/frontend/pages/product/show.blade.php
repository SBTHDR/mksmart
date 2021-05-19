@extends('frontend.layouts.app')

@section('title')
  {{ $product->title }} | {{ $product->slug }}
@endsection

@section('content')

    <div class="container vh-100">
        <div class="row">
            <div class="col-md-4">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">

                    @foreach ($product->images as $image)
                      <div class="carousel-item active border border-warning mt-5">
                        <img src="{{ asset('images/products/' . $image->image) }}" class="d-block w-100" alt="...">
                      </div>
                    @endforeach

                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

            </div>
            <div class="col-md-8">
                <div class="widget mt-5">
                    <h3>{{ $product->title }}</h3>
                    Category: <span class="badge rounded-pill bg-warning text-dark">{{ $product->category->name }}</span>
                    Brand: <span class="badge rounded-pill bg-warning text-dark">{{ $product->brand->name }}</span>
                    <hr>
                    <h3>{{ $product->price }} <small> - টাকা </small> </h3>
                    <hr>
                    <div>
                      <div class="text-danger">
                        <small>Product Details</small>
                      </div>
                      {{ $product->description }}
                    </div>
                    <hr>
                    <div class="row">
                      <div class="text-success">
                        Available Products
                      </div>
                        <p class="card-text">{{ $product->quantity < 1 ? 'Out of stock!' : $product->quantity . ' items in stock' }}</p>
                      <div class="">
                        <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            {{-- using jQuery --}}
                            <button type="button" onclick="addToCart({{ $product->id }})" class="btn btn-outline-warning"><i class="fa fa-plus"> Add to Cart</i></button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
