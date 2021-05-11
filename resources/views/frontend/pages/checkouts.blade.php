@extends('frontend.layouts.app')

@section('content')

    <div class="container vh-100">

        <div class="card">
            <div class="card-header text-danger">
                Confirm Items
            </div>
            <div class="card-body">
                @foreach(App\Models\Cart::totalCarts() as $cart)


                    <p>{{ $cart->product->title }} -
                        <strong>{{ $cart->product->price }} টাকা</strong>
                    </p>
                    - {{ $cart->product_quantity }} item <strong>{{ $cart->product->price * $cart->product_quantity}} টাকা</strong>
                    <hr>

                @endforeach

                <hr>
                <div>
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach(App\Models\Cart::totalCarts() as $cart)
                        @php
                            $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp
                    @endforeach
                    <p>
                        Total price: <strong>{{ $total_price }} টাকা</strong>
                    </p>
                    <p class="text-danger">
                        Total price with shipping cost: <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }} টাকা</strong>
                    </p>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('carts') }}" class="btn btn-dark btn-sm">Change items in cart</a>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header text-danger">
                Shipping Address
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('user.profile.update') }}">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="name" class="col-form-label text-md-right">{{ __('Full Name') }}</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name . '' . Auth::user()->last_name : '' }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="phone_no" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="">
                            <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required autocomplete="phone_no">

                            @error('phone_no')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="shipping_address" class="col-form-label text-md-right">{{ __('Shipping Address') }} <span class="text-muted">(Optional)</span> </label>

                        <div class="">
                            <textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" autocomplete="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                            @error('shipping_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-warning">
                                Confirm Order
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection
