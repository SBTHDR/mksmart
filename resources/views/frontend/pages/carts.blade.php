@extends('frontend.layouts.app')

@section('content')

    <div class="container vh-100">
        <div class="row">
            <div class="col-md-12">
                <div class="widget mt-5">
                    <h3>Carts items</h3>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Product Quantity</th>
                                    <th>Unite Price</th>
                                    <th>Subtotal Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $total_price = 0;
                                @endphp

                                @foreach(App\Models\Cart::totalCarts() as $cart)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', $cart->product->slug) }}">
                                                {{ $cart->product->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($cart->product->images->count() > 0)
                                                <img src="{{ asset('images/products/' . $cart->product->images->first()->image) }}"
                                                     alt="product image"
                                                     class="border border-secondary"
                                                     width="50px">
                                            @endif
                                        </td>
                                        <td>
                                            <form class="form-inline d-flex justify-content-between" action="{{ route('carts.update', $cart->id) }}" method="post">
                                                @csrf
                                                <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
                                                <button type="submit" class="btn btn-dark btn-sm mx-2" >Update</button>
                                            </form>
                                        </td>
                                        <td>
                                            {{ $cart->product->price }} টাকা
                                        </td>
                                        <td>

                                            @php
                                                $total_price += $cart->product->price * $cart->product_quantity;
                                            @endphp

                                            {{ $cart->product->price * $cart->product_quantity }} টাকা
                                        </td>
                                        <td>
                                            <form class="form-inline py-1" action="{{ route('carts.delete', $cart->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        Total Payable Amount
                                    </td>
                                    <td colspan="2">
                                        <span class="text-danger"><strong>{{ $total_price }} টাকা</strong></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            <a href="" class="btn btn-warning mx-2">Back to products</a>
                            <a href="" class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
