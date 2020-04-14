@section('header_css')
   	<link rel="stylesheet" href="{{asset('css/header.css')}}">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	
@endsection
@section('header')

<div class="container-fluid">
<div class="row header">
  <div class="col-xs-12 col-md-3 column">
  	<img id="logo" src="http://demo.tadathemes.com/html_ultrastore/assets/images/logo.png">
  </div>
  <div class="col-xs-6 col-md-6 column" >
	<div id="search_container">
		<form method="get" action="/search">
			<input name="input" type="text" placeholder="search...">
			<button type="submit">
				<img src="{{asset('img/ic_search.png')}}"/>
			</button>
		</form>
	</div>
  </div>
  <div class="col-xs-6 col-md-3 column" >
      	<div id="cart_container">
      		<a href="./cart">
          		Il tuo carrello
          		<img src="{{asset('img/ic_cart.png')}}"/>
          		<div id="num-cart">
					{{$cart_items}}
				</div>                  		
          	</a>
      	</div>
  </div>
</div>

</div>
@endsection
@section('script_header')

@endsection
