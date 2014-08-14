

  function addToCart(id){

  	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	  });

  	$.post('../cart/add', {id: id} ,function(product){

  		var item = $(".shoppingcart #item"+product.id);
      var message = $(".shoppingcart #empty");

    if(message.size()){
      message.remove();
    }


  	if (item.size()){
  		$('#quantity'+product.id).html(product.quantity+" x");
		}
		else 
		{
			$('.shoppingcart').append("<li id='item"+product.id+"'><a href='../product/"+product.id+"'>"+product.name+"</a></li>");
			$('.shoppingcart_quantity').append("<li id='quantity"+product.id+"'>"+product.quantity+" x</li>");

		}


  	});
  }

