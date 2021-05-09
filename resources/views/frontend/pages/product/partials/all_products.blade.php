@if ($products->count() > 0)
  @foreach($products as $product)
      <div class="col-md-3 mb-3">
          <div class="card" style="width: 13rem;">
  {{--                                    <img src="{{ asset('images/product/product_01.jpg') }}" class="card-img-top" alt="Product_01-image">--}}
              @php $i = 1; @endphp
              @foreach($product->images as $image)
                  @if($i > 0)
                      <a href="{{ route('products.show', $product->slug) }}">
                        <img src="{{ asset('images/products/'. $image->image) }}" class="card-img-top" alt="{{ $product->title }}">
                      </a>
                  @endif
              @php $i--; @endphp
              @endforeach
              <div class="card-body">
                  <h5 class="card-title">
                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
                  </h5>
                  <p class="card-text">{{ $product->price }} টাকা</p>
                  <a href="#" class="btn btn-outline-primary">Add to cart</a>
              </div>
          </div>
      </div>
  @endforeach
@else
  <div class="alert alert-warning mt-5">
    No products found
  </div>
@endif
