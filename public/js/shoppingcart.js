

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
			$('.shoppingcart').append("<li><span id='quantity"+product.id+"'>"+product.quantity+" x</span><span id='item"+product.id+"'><a href='../product/"+product.id+"'>"+product.name+"</a></span></li>");

		}


  	});
  }

