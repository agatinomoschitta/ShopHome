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
            	<form class="profile" method="post" action="http://localhost:8000/productSave" enctype="multipart/form-data">
            		@csrf
            		<input type="hidden" name="code" value="{{$product->code}}">
                    <div class="row">
                      <div class="col-xs-12 col-md-12 column" >
                        <p>Titolo:</p>
            			<input name="title" type="text" value="{{$product->title}}">
                      </div>
                      <div class="col-xs-12 col-md-12 column" >
                      	<p>Descrizione:</p>
            			<input name="description" type="text" value="{{$product->description}}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-6 column" >
                      	<p>Url immagine</p>
            			<input type='file' id='getval' name="image" onchange="readURL(event)" /><br/><br/>
            			
                      	<p>Categoria</p>
                      	<select name=category value="{{$product->category}}">
                      		  @for ($i = 0; $i < sizeof($categorie); $i++) 
                      		  	@if($categorie[$i]->categoryID == $product->category)
                      		  		<option selected="selected" value="{{$categorie[$i]->categoryID}}">{{$categorie[$i]->categoryID}}</option>
                      		  	@else                  		  	
                      		  		<option value="{{$categorie[$i]->categoryID}}">{{$categorie[$i]->categoryID}}</option>
                      		  	@endif
                      		  @endfor
                      	</select>
            			
                      	<p>Prezzo</p>
            			<input id="price" name="price" type="text" value="{{$product->price*100}}">
                      </div>
                      <div class="col-xs-12 col-md-6 column" >
						<div id='clock' style="background-image:url('http://localhost:8000/{{$product->img_url}}');"></div>
                      </div>
                      <div class="col-xs-12 col-md-12 column" >
                      	<p>Quantit&agrave;:</p>
            			<input name="quantity" type="text" value="{{$product->quantity_in_stock}}">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6 column" >
                        	<input type="submit" value="Salva modifiche">
                                    	
                        	</form>
                        </div>
                        <div class="col-xs-12 col-md-6 column" >
                        	<form method="get" action="http://localhost:8000/deleteProduct/{{$product->code}}">
    							<input type="submit" value="Elimina">
                       		</form>
                        </div>
                    </div>
        	</div>
      </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/jquery.priceformat.min.js')}}"></script>
<script>
$('#price').priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
</script>
@endsection
@section('script_page')

@endsection