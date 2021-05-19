$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function addToCart(product_id) {
      $.post( "http://localhost/laravel/mksmart/public/carts/store",
        {
          product_id: product_id
        })
          .done(function( data ) {
              alert( "Data Loaded: " + data );
  });
}
