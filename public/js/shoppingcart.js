

  function addToCart(id){

  	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

  	$.post('../cart/add', {id: id} ,function(product){
  		$('.shoppingcart').append("<li><a href='../product/"+product.id+"'>"+product.name+"</a></li>");
  	});
  }

