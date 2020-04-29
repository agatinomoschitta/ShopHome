@extends('layouts.app')


@include('includes.userheader')
@section('page_css')
		<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
     <div class="d-none d-sm-block col-md-2 admin-box"> 
     	AMMINISTRAZIONE
      </div>
      <div class="col-md-10 column admin-box" >
    		
      </div>
    </div>
    <div class="row">
     <div class="d-none d-sm-block col-md-2 nopadding menu-box"> 
     		<a href="http://localhost:8000/ordini" class="voice" ><img src="{{asset('img/order.png')}}">Gestione ordini</a>
     		<a href="http://localhost:8000/prodotti" class="voice" ><img src="{{asset('img/product.png')}}">Gestione prodotti</a>
      </div>
      <div class="col-md-10 content-box" >
    		
      </div>
    </div>
</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>


@endsection