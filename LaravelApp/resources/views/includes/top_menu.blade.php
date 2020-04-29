
@section('top_menu_css')
    <!-- top menu css -->


   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<link rel="stylesheet" href="{{asset('css/top_menu.css')}}">

    <!-- end top menu css -->
@endsection

@section('top_menu')
<div class="topnav padding" id="myTopnav">
  <a href="/" class="active">Home</a>
  @if(!Auth::check())
    <a href="javascript:void(0)">Contatti</a>
  @else 
  	@if(Auth::user()->role == 1)
      	<a href="javascript:void(0)">Ordini</a>
      	<a href="javascript:void(0)">Nuovo prodotto</a>
    @else
      	<a href="http://localhost:8000/order">I miei ordini</a>
      	<a href="javascript:void(0)">Contatti</a>
    @endif
  @endif
</div>
@endsection

@section('script_top_menu')
<script type="text/javascript" src="{{asset('js/top_menu.js')}}"></script>


@endsection
