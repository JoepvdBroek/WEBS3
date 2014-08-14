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
      </div><!-- panel-body -->
    </div><!-- panel-primary -->

    <div class="panel panel-primary">
    	  <div class="panel-heading">
          	<h3 class="panel-title">Uw winkelwagen <span class="glyphicon glyphicon-shopping-cart"></h3>
        </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-lg-12">
                  <ul class="list-unstyled">
                    <div class="shoppingcart">
                    @if(Cart::totalItems(true) > 0)
                      @foreach(Cart::contents() as $item)
                        <li>
                          <span id="quantity{{ $item->id }}">{{ $item->quantity }} x</span>
                          <span id="item{{ $item->id }}">{{ HTML::linkRoute('product.show', $item->name, array($item->id)) }}</span>
                        </li>
                      @endforeach
                    @else
                      <li id="empty">Uw Winkelwagen is nog leeg</li>
                    @endif
                    </div><!-- shoppingcart -->
                  </ul>
                </div><!-- .col-lg-12 -->
             </div><!-- .row -->
        </div><!-- panel-body -->

   	</div><!-- panel-primary -->

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
		      </div><!-- input-group -->
      </div><!-- panel-body -->
    </div><!-- panel-primary -->
</div>