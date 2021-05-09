@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="d-flex">
                                    <div class="wrapper">
{{--                                        <h3 class="mb-0 font-weight-semibold">32,451</h3>--}}
                                        <h3 class="mb-0 font-weight-semibold">{{ $products->count() }}</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Total Products</h5>
                                        <p class="mb-0 text-muted">+14.00(+0.50%)/Today</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{ $categories->count() }}</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Total Category</h5>
                                        <p class="mb-0 text-muted">+138.97(+0.54%)/Today</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">7</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Total Order</h5>
                                        <p class="mb-0 text-muted">+57.62(+0.76%)/Day</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">0</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Total Cancel Items</h5>
                                        <p class="mb-0 text-muted">(+0.00%)/Day</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
