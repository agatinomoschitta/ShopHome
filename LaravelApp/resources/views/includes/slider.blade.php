
@section('slider_css')
	<link rel="stylesheet" href="{{asset('css/slider.css')}}">

    <!-- end top menu css -->
@endsection

@section('slider')
 <div class="slider-container">
    <div class="flexbox-slideshow">
		<ul class="slideshow">
			<li class="slide active" id="slide-1">
				<img class="center-cropped" src="{{asset('img/ace.jpg')}}"/>
			</li>
			<li class="slide" id="slide-2"><img class="center-cropped" src="{{asset('img/ace.jpg')}}"/></li>
			<li class="slide" id="slide-3"><img class="center-cropped" src="{{asset('img/ace.jpg')}}"/></li>
		</ul>
		<ul class="dotnav">
			<li class="dotnav-item" onclick="changeOrder(this, 1)"><span></span></li>
			<li class="dotnav-item" onclick="changeOrder(this, 2)"><span></span></li>
			<li class="dotnav-item" onclick="changeOrder(this, 3)"><span></span></li>
		</ul>
	</div>
 </div> 
@endsection

@section('script_slider')
<script type="text/javascript" src="{{asset('js/slider.js')}}"></script>


@endsection
