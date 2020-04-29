@extends('layouts.app')

@include('includes.top_menu')

@include('includes.userheader')
@include('includes.header')
@include('includes.side_menu')
@include('includes.confirm_checkout')
@section('page_css')
@endsection
@section('content')
<div class="section">
    <div class="container-fluid padding">
        <div class="row">
	          <div class="col-md-12 column" >
	          	<br>
	          	<br>
	          	<p class="section_title">
	          		I tuoi dati di spedizione      		
	          	</p>
	          </div>
        </div>
        @yield("checkout")
    </div>
</div>
@endsection
@section('script_page')
@endsection