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
	          		I miei ordini         		
	          	</p>
	          </div>
        </div>
        
        <div class="row">
	          <div class="col-md-12 column" >
	          	
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
        		  <tr onclick="location.href = 'http://localhost:8000/detailorder/{{$order[$i]->orderID}}';">
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
    		<br><br>
	          </div>
        </div>
    </div>
</div>
@endsection
@section('script_page')
@endsection