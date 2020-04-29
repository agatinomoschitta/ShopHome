@extends('layouts.app')


@include('includes.userheader')
@section('page_css')
		<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
		<link rel="stylesheet" href="{{asset('css/dashboard_order.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
     <div class="d-none d-sm-block col-md-2 column admin-box"> 
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
      <div class="col-md-10 column content-box" >
    		<table width="100%" align="center">
    		  <tr>
    		  <th width="12%">Identificativo</th>
    		  <th width="12%">Nome</th>
    		  <th width="12%">Cognome</th>
    		  <th width="12%">Telefono</th>
    		  <th width="14%">Indirizzo</th>
    		  <th width="12%">Comune</th>
    		  <th width="14%">Luogo di consegna</th>
    		  <th width="12%">Totale &euro;</th>
    		  </tr>
        	  @for ($i = 0; $i < sizeof($order); $i++)   	          
        		  <tr onclick="location.href = 'http://localhost:8000/orderdetails/{{$order[$i]->orderID}}';">
        		  <td width="12%">{{$order[$i]->orderID}}</td>
        		  <td width="12%">{{$order[$i]->name}}</td>
        		  <td width="12%">{{$order[$i]->surname}}</td>
        		  <td width="12%">{{$order[$i]->contactNumber}}</td>
        		  <td width="14%">{{$order[$i]->address}}</td>
        		  <td width="12%">{{$order[$i]->country}}</td>
        		  <td width="14%">{{$order[$i]->city}}</td>
        		  <td width="12%">{{$order[$i]->amount}}</td>
        		  </tr>	
    		  @endfor	
    		</table>  	
      </div>
    </div>
</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>


@endsection