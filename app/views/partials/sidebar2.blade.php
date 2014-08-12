<div class='col-lg-4'>

	<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Categoriën</h3>
    </div>
    <div class="panel-body">
    <ul>
        <?php $categories = Category::where('parent', '=', '0')->get(); ?>

        @foreach($categories as $category)
        <li>
            {{ $category->name }}
            <ul>
            <?php $subcategories = Category::where('parent', '=', $category->id)->get(); ?>
                @foreach($subcategories as $sub)
                    <li>{{ HTML::linkRoute('category.show', $sub->name, $sub->id) }}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
    </div>
    </div>

    <div class="panel panel-primary">
    	  <div class="panel-heading">
          	<h3 class="panel-title">Uw winkelwagen <span class="glyphicon glyphicon-shopping-cart"></h3>
        </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-lg-2">
                  <ul class="list-unstyled">
                    <div class="shoppingcart_quantity">
                      @if(Cart::totalItems(true) > 0)
                        @foreach(Cart::contents() as $item)
                          <li id="quantity{{ $item->id }}">{{ $item->quantity }} x</li>
                        @endforeach
                      @endif
                    </div>
                  </ul>
                </div>

                <div class="col-lg-10">
                  <ul class="list-unstyled">
                    <div class="shoppingcart">
                    @if(Cart::totalItems(true) > 0)
                      @foreach(Cart::contents() as $item)
                        <li id="item{{ $item->id }}">{{ HTML::linkRoute('product.show', $item->name, array($item->id)) }}</li>
                      @endforeach
                    @else
                      <li>Uw Winkelwagen is nog leeg</li>
                    @endif
                    </div>
                  </ul>
                </div>
             </div>
        </div>

   	</div>

   	<div class="panel panel-primary">
   		<div class="panel-heading">
          	<h3 class="panel-title">Zoek naar <span class="glyphicon glyphicon-search"></span></h3>
        </div>
        <div class="panel-body">
		    {{ Form::open(array('url' => 'search')) }}
		    <div class="input-group">
		    {{Form::text('search', '', array('class' => 'form-control'))}}
		    <span class="input-group-btn">
		    {{ Form::submit('Zoek', array('class' => 'btn btn-default'))}}
		    </span>
		    {{ Form::close()}}
		</div>
    </div><!-- /input-group -->
</div>
</div>