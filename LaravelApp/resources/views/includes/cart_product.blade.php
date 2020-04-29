 <div class="row">
  <div class="col-md-12 column" >
     <div class="product-container">
    	  <a href="#product" ><img src="{{$product->img_url}}"/></a>
    	<div class="title">
    		<div class="rows">
    		<a href="#product">{{$product->title}}</a><br>
    		{{$product-> description}}<br>
    		&euro;{{$product->price}} EUR
    		</div>
    		<div class="delete">
    			<form method=post action="deleteItemCart">
    				@csrf
    				<input type="hidden" name="code" value="{{$product->code}}">
    				<button type="submit">X</button>
    			</form>
    		</div>
    	</div>
    	
    </div>
   </div>
</div>


