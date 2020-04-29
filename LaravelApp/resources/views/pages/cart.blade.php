@extends('layouts.app')

@include('includes.top_menu')

@include('includes.userheader')
@include('includes.header')
@include('includes.side_menu')
@section('page_css')
		<link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
<br>
<div class="container-fluid padding">
    	  @for ($i = 0; $i < sizeof($products); $i++)   		
			@include('includes.cart_product', ["product" => $products[$i]])
		 @endfor	
</div>
<div class="container-fluid padding">
	<div class="row">
		@if(Auth::check())
			<a class="checkout" href="checkout">Checkout</a>
		@else
			<a class="checkout" href="#" onClick="on()">Checkout</a>
		@endif
	</div>
</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/cart.js')}}"></script>


@endsection