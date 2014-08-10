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
          	<h3 class="panel-title">Uw winkelwagen</h3>
        </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-lg-6">
                  <ul class="list-unstyled">
                    <div class="shoppingcart">
                    
                      @foreach($cart->contents(true) as $item)
                        <li>{{ $item->name }}</li>
                      @endforeach
                    <!-- else voor 'uw winkelwagen is nog leeg'-->
                    
                    </div>
                  </ul>
                </div>

                <div class="col-lg-6">
                  <ul class="list-unstyled">
                    <div class="shoppingcart_quantity">
                    </div>
                  </ul>
                </div>

             </div>
        </div>

   	</div>

   	<div class="panel panel-primary">
   		<div class="panel-heading">
          	<h3 class="panel-title">Zoek naar</h3>
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