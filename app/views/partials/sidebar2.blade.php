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
                    <li><a href="#dinosaurs">Dinosaurs</a></li>
                    <li><a href="#spaceships">Spaceships</a></li>
                    <li><a href="#fried-foods">Fried Foods</a></li>
                    <li><a href="#wild-animals">Wild Animals</a></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled">
                    <li><a href="#alien-abductions">Alien Abductions</a></li>
                    <li><a href="#business-casual">Business Casual</a></li>
                    <li><a href="#robots">Robots</a></li>
                    <li><a href="#fireworks">Fireworks</a></li>
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