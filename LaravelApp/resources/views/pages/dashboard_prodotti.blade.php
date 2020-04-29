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
      		 <br><a href="newproduct">Inserisci un nuovo prodotto</a>&nbsp; <a href="newcategory">Inserisci una categoria</a><br><br>
    			<table width="100%" align="center" >
    		  <tr>
    		  <th width="20%">Codice prodotto</th>
    		  <th width="20%"></th>
    		  <th width="30%">Titolo</th>
    		  <th width="15%">Categoria</th>
    		  <th width="15%">Prezzo unitario</th>
    		  </tr>
        	  @for ($i = 0; $i < sizeof($rows); $i++)   	            	  
        		  <tr onclick="location.href = 'http://localhost:8000/editproduct/{{$rows[$i]->code}}';">
        		  <td width="20%">{{$rows[$i]->code}}</td>
        		  <td width="20%"><img src="{{$rows[$i]->img_url}}"></td>
        		  <td width="30%">{{$rows[$i]->title}}</td>
        		  <td width="15%">{{$rows[$i]->category}}</td>
        		  <td width="15%">{{$rows[$i]->price}} &euro;</td>
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