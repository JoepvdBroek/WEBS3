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
			$('.shoppingcart').append("<li><span id='quantity"+product.id+"'>"+product.quantity+" x </span><span id='item"+product.id+"'><a href='../product/"+product.id+"'>"+product.name+"</a></span></li>");

		}


  	});
}

function increaseQuantity(id){

    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

  //var id = $(this).data('id');

    $.post('cart/add', {id: id} , function(product){

        var quantity = $("#quantity");

        $('#quantity'+id).html(' '+product.quantity+' ');
        $('#price'+id).html('&#8364; '+(product.price*product.quantity)+' ');
        $('#total').html('Totaal prijs: &#8364; '+ product.total);
    });
}

function decreaseQuantity(id){

  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

  //var id = $(this).data('id');

    $.post('cart/remove', {id: id} , function(product){

        if(product.quantity!=null)
        {
          $('#quantity'+id).html(' '+product.quantity+' ');
          $('#price'+id).html('&#8364; '+(product.price*product.quantity)+' ');
          $('#total').html('Totaal prijs: &#8364; '+ product.total);
        }
        else
        {
          location.reload();
        }
        
    });
}

function removeItem(id){
    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.post('cart/delete', {id: id} , function(product){
        console.log(product);
        location.reload();
                   
    });
}


