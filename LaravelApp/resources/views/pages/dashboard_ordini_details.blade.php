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
    		<table width="100%" align="center" >
    		  <tr>
    		  <th width="20%">Codice prodotto</th>
    		  <th width="10%"></th>
    		  <th width="20%">Titolo</th>
    		  <th width="10%">Categoria</th>
    		  <th width="10%">Quantita'</th>
    		  <th width="15%">Prezzo unitario</th>
    		  <th width="15%">Totale</th>
    		  </tr>
    		 <?php  $somma=0; ?>
        	  @for ($i = 0; $i < sizeof($rows); $i++)   	            	  
        		  <tr>
        		  <td width="20%">{{$rows[$i]->productID}}</td>
        		  <td width="10%"><img src="http://localhost:8000/{{$rows[$i]->img_url}}"></td>
        		  <td width="20%">{{$rows[$i]->title}}</td>
        		  <td width="10%">{{$rows[$i]->category}}</td>
        		  <td width="10%">{{$rows[$i]->quantity}}</td>
        		  <td width="15%">{{$rows[$i]->amount}} &euro;</td>
        		  <td width="15%">{{$rows[$i]->amount * $rows[$i]->quantity}} &euro;</td>
        		  </tr>	
        		  <?php $somma+=$rows[$i]->amount * $rows[$i]->quantity ?>
    		  @endfor	
    		   <tr>
        		  <th width="20%" onclick="location.href = 'http://localhost:8000/ordini'">Indietro</th>
        		  <th width="30%" onClick="location.href = 'http://localhost:8000/deleteOrder/{{$rows[0]->orderID}}'" colspan=2>Evadi ordine e rimuovi</th>
        		  <th width="10%"></th>
        		  <th width="10%"></th>
        		  <th width="15%">Totale ordine</th>
        		  <th width="15%">{{$somma}}  &euro;</th>
        		</tr>	
    		</table> 
      </div>
    </div>
</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>


@endsection