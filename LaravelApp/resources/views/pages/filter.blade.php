@extends('layouts.app')

@include('includes.top_menu')

@include('includes.userheader')
@include('includes.header')
@include('includes.side_menu')
@section('page_css')
		<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')
<br>
<div class="container-fluid padding">
    <div class="row">
     <div class="d-none d-sm-block col-md-3 column">
      	@yield('side_menu')
      </div>
      <div class="col-md-9 column" >
    	  @for ($i = sizeof($products)-1; $i >= sizeof($products)-3 && $i>=0; $i--)   		
			@include('includes.product', ["product" => $products[$i]])
		 @endfor		
      </div>
    </div>
</div>
<br>
<div class="section">
    <div class="container-fluid padding">
        <div class="row">
	          <div class="col-md-12 column" >
	          	<p class="section_title">
	          		prodotti in offerta
	          	</p>
	          </div>
        </div>
        <div class="row">
          <div class="col-md-12 column" >
        	  @for ($i = sizeof($products)-1; $i >= sizeof($products)-4 && $i>=0; $i--)   		
    			@include('includes.product', ["product" => $products[$i]])
    		 @endfor		
          </div>
        </div>
    </div>
</div>

<div id="cart-overlay">
  <div id="cart-container">
  	<div id="title">Prodotto aggiunto al carrello <button id="close" onClick="cartOff()">X</button></div>
		<a id="continue" href="#forgot" onClick="cartOff()">Continua lo shopping</a>
		<a id="checkout" href="cart">Vai al carrello</a>
  </div>
</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/index.js')}}"></script>


@endsection