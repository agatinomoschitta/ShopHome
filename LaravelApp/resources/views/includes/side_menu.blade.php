
@section('side_menu_css')
    <!-- top menu css -->


   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<link rel="stylesheet" href="{{asset('css/side_menu.css')}}">

    <!-- end top menu css -->
@endsection

@section('side_menu')
	<div class="menu">
		<div id="title">CATEGORIE</div>
		<ul class="fa-ul">
			<li><img src="{{asset('img/ic_pasta.png')}}"/><a href="http://localhost:8000/filter/Pasta">Pasta riso e cereali</a>
				<ul>
					<li><a href="http://localhost:8000/filter/Pasta">Pasta secca</a></li>
					<li><a href="http://localhost:8000/filter/Pasta">Pasta fresca</a></li>
					<li><a href="http://localhost:8000/filter/Pasta">Riso e cereali</a></li>
				</ul>
			</li>
			<li><img src="{{asset('img/ic_fish.png')}}"/><a href="http://localhost:8000/filter/Pesce">Pesce</a>
				<ul>
					<li><a href="http://localhost:8000/filter/Pesce">Pesce</a></li>
					<li><a href="http://localhost:8000/filter/Pesce">Crostacei</a></li>
					<li><a href="http://localhost:8000/filter/Pesce">Molluschi</a></li>
				</ul>
			</li>
			<li><img src="{{asset('img/ic_cheese.png')}}"/><a href="http://localhost:8000/filter/Formaggio">Formaggi e latticini</a>
				<ul>
					<li><a href="http://localhost:8000/filter/Formaggio">Formaggi</a></li>
					<li><a href="http://localhost:8000/filter/Formaggio">Latte</a></li>
					<li><a href="http://localhost:8000/filter/Formaggio">Yougurt</a></li>
					<li><a href="http://localhost:8000/filter/Formaggio">Latticini</a></li>
				</ul>
			</li>
			<li><img src="{{asset('img/ic_fruit.png')}}"/><a href="#">Frutta e verdura</a>
				<ul>
					<li><a href="#">Frutta fresca</a></li>
					<li><a href="#">Verdura</a></li>
					<li><a href="#">Frutta secca</a></li>
				</ul>
			</li>
			<li><img src="{{asset('img/ic_breakfast.png')}}"/><a href="#">Colazione e dolciumi</a>
				<ul>
					<li><a href="#">Biscotti</a></li>
					<li><a href="#">Croissants e brioche</a></li>
					<li><a href="#">Creme spalmabili</a></li>
				</ul>
			</li>			
			<li><img src="{{asset('img/ic_ice.png')}}"/><a href="#">Surgelati e gelati</a>
				<ul>
					<li><a href="#">Minestroni e verdure</a></li>
					<li><a href="#">Pesce, crostacei e molluschi</a></li>
					<li><a href="#">Pizze e torte</a></li>
				</ul>
			</li>			
			<li><img src="{{asset('img/ic_water.png')}}"/><a href="#">Acqua e bevande</a>
				<ul>
					<li><a href="#">Acqua</a></li>
					<li><a href="#">Bevande analcoliche</a></li>
					<li><a href="#">Bevande alcoliche</a></li>
				</ul>
			</li>			
			<li><img src="{{asset('img/ic_clean.png')}}"/><a href="#">Igiene e pulizia</a>
				<ul>
					<li><a href="#">Sapone per le mani</a></li>
					<li><a href="#">Shampo e bagnuschiuma</a></li>
					<li><a href="#">Pulizia della casa</a></li>
				</ul>
			</li>
		</ul>
	</div>
@endsection

@section('script_side_menu')


@endsection
