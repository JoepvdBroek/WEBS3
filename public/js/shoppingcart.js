

  function addToCart(id, name){

  	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

  	$.post('../cart', {id: id} ,function(product){
  		$('.shoppingcart').append('<li>'+ product.name + '</li>');
  	});
  }

