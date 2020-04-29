@extends('layouts.app')


@include('includes.userheader')
@section('page_css')
		<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
   	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
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
      		<div class="form-container">
            	@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="  list-style-type: none;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            	<form class="profile" method="post" action="http://localhost:8000/productAdd" enctype="multipart/form-data">
            		@csrf
            		<input type="hidden" name="code">
                    <div class="row">
                      <div class="col-xs-12 col-md-12 column" >
                        <p>Titolo:</p>
            			<input name="title" type="text">
                      </div>
                      <div class="col-xs-12 col-md-12 column" >
                      	<p>Descrizione:</p>
            			<input name="description" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-6 column" >
                      	<p>Url immagine</p>
            			<input type='file' id='getval' name="image" onchange="readURL(event)" /><br/><br/>
            			
                      	<p>Categoria</p>
                      	<select name=category >
                      		  @for ($i = 0; $i < sizeof($categorie); $i++)               		  	
                      		  		<option value="{{$categorie[$i]->categoryID}}">{{$categorie[$i]->categoryID}}</option>                      		  
                      		  @endfor
                      	</select>
            			
                      	<p>Prezzo</p>
            			<input name="price" type="text" >
                      </div>
                      <div class="col-xs-12 col-md-6 column" >
						<div id='clock'></div>
                      </div>
                      <div class="col-xs-12 col-md-12 column" >
                      	<p>Quantit&agrave;:</p>
            			<input name="quantity" type="text">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 column" >
                        	<input type="submit" value="Aggiungi prodotto">
                                    	
                        	</form>
                        </div>
                    </div>
        	</div>
      </div>
    </div>
</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
<script>

function readURL(event){
    var getImagePath = URL.createObjectURL(event.target.files[0]);
    $('#clock').css('background-image', 'url(' + getImagePath + ')');
   }
</script>

@endsection