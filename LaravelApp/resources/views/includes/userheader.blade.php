@section('user_header_css')
   	<link rel="stylesheet" href="{{asset('css/user_header.css')}}">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	
@endsection
@section('user_header')

<div class="container-fluid">
<div class="row user_header">
  <div class="col-xs-4 col-md-2 boxed_column">
  	<img src="{{asset('img/ic_facebook.png')}}" class="icon">
  	<img src="{{asset('img/ic_twitter.png')}}" class="icon">
  </div>
  <div class="d-none d-sm-block  col-md-2" >
	
  </div>
  @if(!Auth::check())
  	  
      <div class="d-none d-sm-block  col-md-2 " >
    
      </div>
      <div class="d-none d-sm-block col-md-2 " >
    
      </div>
      <div class="d-none d-sm-block  col-md-2 boxed_column" >
  	  &nbsp;
      </div>
      <div class="col-xs-8 col-md-2 boxed_column" id="account_btn">     	
     	
     	<a href="#access" onClick="on()"><img src="{{asset('img/ic_login.png')}}" class="icon" onClick="on()">
      	Il mio account</a>
      </div>
  @else
  	 
  	  <div class="d-none d-sm-block  col-md-2 boxed_column" >
		</div>
      <div class="d-none d-sm-block  col-md-3 boxed_column "  >
    			<p class="box_link">&nbsp &nbsp Benvenuto: {{Auth::user()->name}},</p>
    
      </div>
  	  <div class="d-none d-sm-block  col-md-2 boxed_column" id="profile_btn" clickable="true">
  	  			<a href="/users/profilo">
  	  				<p class="box_link"><img src="{{asset('img/ic_user.png')}}" class="icon" >&nbspIl mio profilo</p>
  	  			</a>
		</div>
      <div class="col-xs-8 col-md-1 boxed_column" id="account_btnl" clickable="true">     	    	
     	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><img src="{{asset('img/ic_logout.png')}}" class="icon">Logout</a>
     	<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    		{{ csrf_field() }}
		</form>
      </div>
  @endif
</div>

</div>

<div id="overlay">
  <div id="login">
  	<div id="title">Esegui l'accesso <button id="close" onClick="off()">X</button></div>
    	<form method="POST" action="{{ route('login') }}" class="login-form">
			@csrf
    		<input name="contactNumber" type="number"  placeholder="Numero di telefono" value="{{ old('contactNumber') }}"><br>
    		<input name="password" type="password"  placeholder="Password" required autocomplete="current-password"><br>
    		<button type="submit">Accedi</button>
    		<a id="forgot" href="#forgot">Password dimenticata?</a>
    		<a id="create_account" href="#create">Crea un account</a>
    	</form>
  </div>
</div>
@endsection
@section('script_user_header')
<script type="text/javascript" src="{{asset('js/user_header.js')}}"></script>
@endsection
