
@section('top_menu_css')
    <!-- top menu css -->


   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<link rel="stylesheet" href="{{asset('css/top_menu.css')}}">

    <!-- end top menu css -->
@endsection

@section('top_menu')
<div class="topnav padding" id="myTopnav">
  <a href="/" class="active">Home</a>
  <a href="javascript:void(0)">News</a>
  <a href="javascript:void(0)">Contact</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="javascript:void(0)">Link 1</a>
      <a href="javascript:void(0)">Link 2</a>
      <a href="javascript:void(0)">Link 3</a>
    </div>
  </div> 
  <a href="javascript:void(0)">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">☰</a>
</div>
@endsection

@section('script_top_menu')
<script type="text/javascript" src="{{asset('js/top_menu.js')}}"></script>


@endsection
