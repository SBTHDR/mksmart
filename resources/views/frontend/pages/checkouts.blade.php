@extends('frontend.layouts.app')

@section('content')

    <div class="container">

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

                <form method="POST" action="{{ route('checkouts.store') }}">
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
                        <label for="shipping_address" class="col-form-label text-md-right">{{ __('Shipping Address') }} <span class="text-muted">(*)</span> </label>

                        <div class="">
                            <textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" autocomplete="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                            @error('shipping_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="message" class="col-form-label text-md-right">{{ __('Message') }} <span class="text-muted">(Optional)</span> </label>

                        <div class="">
                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" autocomplete="message">

                            </textarea>

                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="payment_method" class="col-form-label text-md-right">{{ __('Payment Method') }}  <span class="text-muted">(*)</span> </label>

                        <div>

                            <select name="payment_method_id" id="payment_method_id" class="form-control mb-2" style="cursor: pointer">

                                <option value="">Please select a payment method</option>
                                @foreach($payments as $payment)
                                    <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                @endforeach
                            </select>


                            @foreach($payments as $payment)

                                @if($payment->short_name === "cash_on_delivery")
                                    <div id="payment_{{ $payment->short_name }}" class="hidden mb-2">
                                        <div class="alert alert-success">
                                            <strong>Cash on Delivery confirmed! </strong> click Confirm Order button to complete payment
                                        </div>
                                    </div>
                                @else
                                    <div id="payment_{{ $payment->short_name }}" class="hidden mb-2">
                                      @if ($payment->short_name === 'bkash')
                                        <img src="{!! asset('images/payment/bkash.png') !!}" alt="">
                                      @elseif ($payment->short_name === 'rocket')
                                        <img src="{!! asset('images/payment/rocket.png') !!}" alt="">
                                      @endif
                                        <div class="border border-secondary p-2 mb-2">
                                            <h3>{{ $payment->name }} Payment Details</h3>
                                            <p>
                                                <strong>{{ $payment->name }} A/C No: {{ $payment->no }}</strong>
                                                <br>
                                                <strong>A/C Type: {{ $payment->type }}</strong>
                                            </p>
                                        </div>
                                        <div class="alert alert-success">
                                            <strong>Send money to the above A/C No. after that give the transaction id bellow, and </strong> click Confirm Order button to complete payment
                                        </div>

                                    </div>
                                @endif

                            @endforeach
                            <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction id">


                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
                            <script type="text/javascript">
                                $("#payment_method_id").change(function () {
                                    $payment_method = $("#payment_method_id").val();

                                    if ($payment_method === "cash_on_delivery") {
                                        $("#payment_cash_on_delivery").removeClass('hidden');
                                        $("#payment_bkash").addClass('hidden');
                                        $("#payment_rocket").addClass('hidden');
                                    }else if($payment_method === "bkash") {
                                        $("#payment_bkash").removeClass('hidden');
                                        $("#payment_cash_on_delivery").addClass('hidden');
                                        $("#payment_rocket").addClass('hidden');
                                        $("#transaction_id").removeClass('hidden');
                                    }else if($payment_method === "rocket") {
                                        $("#payment_rocket").removeClass('hidden');
                                        $("#payment_cash_on_delivery").addClass('hidden');
                                        $("#payment_bkash").addClass('hidden');
                                        $("#transaction_id").removeClass('hidden');
                                    }
                                })
                            </script>

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
