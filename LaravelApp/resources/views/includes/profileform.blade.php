@section('page_css')
   	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	
@endsection
@section('profile')
	<div class="form-container">
	<form class="profile" method="post" action="save" onSubmit="return save()">
		@csrf
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
            <p>Nome:</p>
			<input name="name" type="text" placeholder="Nome" value="{{$user->name}}">
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Cognome:</p>
			<input name="surname" type="text" placeholder="Cognome" value="{{$user->surname}}">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
          	<p>Indirizzo:</p>
			<input name="address" type="text" placeholder="Indirizzo" value="{{$user->address}}">
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Cap:</p>
			<input name="cap" type="text" placeholder="cap" value="{{$user->cap}}">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
          	<p>Comune:</p>
			<input name="country" type="text" placeholder="Comune" value="{{$user->country}}">
          </div>
          <div class="col-xs-12 col-md-6 column" >
          	<p>Citt&agrave;:</p>
			<input name="city" type="text" placeholder="Citt&agrave;" value="{{$user->city}}">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6 column" >
          	<p>Stato:</p>
			<input name="state" type="text" placeholder="Nazione" value="{{$user->state}}">
          </div>
        </div>
		<input type="submit" value="Salva modifiche">
	</form>
	</div>
@endsection
@section('script_page')
<script type="text/javascript" src="{{asset('js/profilo.js')}}"></script>
@endsection
