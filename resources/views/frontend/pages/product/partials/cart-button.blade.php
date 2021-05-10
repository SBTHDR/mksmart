<form class="form-inline" action="{{ route('carts.store') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-plus"> Add to Cart</i></button>
</form>
