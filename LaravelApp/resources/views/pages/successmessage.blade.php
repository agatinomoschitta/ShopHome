@extends('layouts.app')

@include('includes.top_menu')

@include('includes.userheader')
@include('includes.header')
@include('includes.side_menu')
@section('page_css')
<style>
    #message-container{
         text-align:center;
         height: 200px;
         vertical-align: middle;
         width: 100%;
         padding :25px;
         color: #449944;
    }
</style>
@endsection
@section('content')
	<div id="message-container">
		Il tuo account e' stato creato con successo
	</div>
@endsection
@section('script_page')

@endsection