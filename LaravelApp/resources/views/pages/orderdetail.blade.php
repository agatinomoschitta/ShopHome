@extends('layouts.app')

@include('includes.top_menu')

@include('includes.userheader')
@include('includes.header')
@include('includes.side_menu')
@section('page_css')
		<link rel="stylesheet" href="{{asset('css/order.css')}}">
@endsection
@section('content')
<div class="section">
    <div class="container-fluid padding">
        <div class="row">
	          <div class="col-md-12 column" >
	          	<br>
	          	<br>
	          	<p class="section_title">
	          		Ordine numero: {{$rows[0]->orderID}}      		
	          	</p>
	          </div>
        </div>
        
        <div class="row">
	          <div class="col-md-12 column" >
	          	
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
        		  <th width="20%" onclick="location.href = 'http://localhost:8000/order'">Indietro</th>
        		  <td width="10%"></td>
        		  <td width="20%"></td>
        		  <td width="10%"></td>
        		  <td width="10%"></td>
        		  <th width="15%">Totale ordine</th>
        		  <th width="15%">{{$somma}}  &euro;</th>
        		</tr>	
    		</table> 
    		<br><br>
	          </div>
        </div>
    </div>
</div>
@endsection
@section('script_page')
@endsection