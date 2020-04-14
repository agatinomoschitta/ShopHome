 <div class="product-container img-hover-zoom--quick-zoom">
	 <a href="#product" ><img src="{{$product->img_url}}"/></a>
	<div class="overlay">
		<a href="#addcart"> <img src="{{asset('img/ic_cart_white.png')}}"/>	AGGIUNGI AL CARRELLO </a>
	</div>
	<div class="category">{{$product->category}}</div>
	<div class="title"><a href="#product">{{$product->title}}</a></div>
	<div class="price">&euro;{{$product->price}} EUR</div>
	<div class="row_price">
		<div class="scounted">&nbsp; &euro;{{$product->price}} EUR</div>
	</div>
</div>


