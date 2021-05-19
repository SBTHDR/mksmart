$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function addToCart(product_id) {
      $.post( "http://localhost/laravel/mksmart/public/api/carts/store",
        {
          product_id: product_id
        })
          .done(function( data ) {
              console.log(data);
  });
}
