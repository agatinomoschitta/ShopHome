 <div class="product-container img-hover-zoom--quick-zoom">
	 <a href="#product" ><img src="{{$product->img_url}}"/></a>
	<div class="overlay">
		<form method="post" action="addCart" onSubmit="return addCart('{{$product->code}}');">
		@csrf
			<input type="hidden" value="{{$product->code}}" name="code">
			<button type="submit" style="text-decoration: none; border:none; color: #fff; font: 10px Poppins !important; background-color: rgb(230, 46, 4)" ><img src="{{asset('img/ic_cart_white.png')}}" >	AGGIUNGI AL CARRELLO </button>
		</form>
	</div>
	<div class="category">{{$product->category}}</div>
	<div class="title"><a href="#product">{{$product->title}}</a></div>
	<div class="price">&euro;{{$product->price}} EUR</div>
	<div class="row_price">
		<div class="scounted">&nbsp; &euro;{{$product->price}} EUR</div>
	</div>
</div>


