@section('page_css')
   	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	
@endsection
@section('profile')
	<div class="form-container">
	<form class="profile" method="post" action="{{ route('register') }}" >
		@csrf
		
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
            <p>Numero di telefono (username):</p>
    		<input id="contactNumber" name="contactNumber" type="number"  placeholder="Numero di telefono" value="{{ old('contactNumber') }} " required autocomplete="current-password"><br>
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Password:</p>
    		<input id="password" type="password"  placeholder="Password" name="password" required autocomplete="new-password"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
          </div>
          <div class="col-xs-12 col-md-6 column" >
            <p>Conferma password:</p>
            <input id="password-confirm" type="password" placeholder="Conferma password" name="password_confirmation" required autocomplete="new-password"><br>       
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 column" >
          	<br>
          	<hr>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
            <p>Nome:</p>
            <input id="name" type="text" name="name" placeholder="Nome" required autocomplete="current-password"><br>
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Cognome:</p>
            <input id="surname" type="text" name="surname" placeholder="Cognome" required autocomplete="current-password"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
          	<p>Indirizzo:</p>
            <input id="address" type="text" name="address" placeholder="Indirizzo" required autocomplete="current-password"><br>
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Cap:</p>
            <input id="cap" type="text" name="cap" placeholder="CAP" required autocomplete="current-password"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
          	<p>Comune:</p>
            <input id="country" type="text" name="country" placeholder="Comune" required autocomplete="current-password"><br>
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Citt&agrave;:</p>
            <input id="city" type="text" name="city" placeholder="Provincia" required autocomplete="current-password"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 column" >
          	<p>Stato:</p>
            <input id="state" type="text" name="state" placeholder="Stato" required autocomplete="current-password"><br>
          </div>
        </div>
		<input type="submit" value="Salva modifiche">
	</form>
	</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/profilo.js')}}"></script>
@endsection
