@extends('defaults.layout')
@section('title')
	home title
@stop

@include('defaults.nav')
@section('content')
<!-- Home -->
<div class="wrapper style1 first">
	<article class="container" id="top">
		@if(Session::has('global'))
			<span class='global-notice'>{{Session::get('global')}}</span>
		@endif
		<div class="row">
			<div class="4u">
				<span class="image fit"><img src="images/site/logo.jpg" alt="make up" /></span>
			</div>
			<div class="8u">
				<header>
					<h1>Hi. I'm <strong>Name</strong>.</h1>
				</header>
				<p>And this is <strong>Miniport</strong>, a free, fully responsive HTML5 site template designed by <a href="http://n33.co">AJ</a> for <a href="http://html5up.net">HTML5 UP</a> &amp; released under the <a href="http://html5up.net/license">CCA license</a>.</p>
				<a href="#work" class="button scrolly">Learn about what I do</a>
			</div>
		</div>
	</article>
</div>

<!-- Work -->
<div class="wrapper style2">
	<article id="work">
		<header>
			<h2>Here's all the stuff I do.</h2>
			<p>Odio turpis amet sed consequat eget posuere consequat.</p>
		</header>
		<div class="container">
			<div class="row">
				<div class="6u">
					<section class="box style1">
						<span class="image fit"><img src="images/site/lips.jpg" alt="" /></span>
						<h3>Consequat lorem</h3>
						<p>Ornare nulla proin odio consequat sapien vestibulum ipsum primis sed amet consequat lorem dolore.</p>
					</section>
				</div>
				<div class="6u">
					<section class="box style1">
						<span class="image fit"><img src="images/site/eye.jpg" alt="" /></span>
						<h3>Consequat lorem</h3>
						<p>Ornare nulla proin odio consequat sapien vestibulum ipsum primis sed amet consequat lorem dolore.</p>
					</section>
				</div>
			</div>
		</div>
		<footer>
			<p>Lorem ipsum dolor sit sapien vestibulum ipsum primis?</p>
			<a href="{{URL::route('home.services.get')}}" class="button big scrolly">Read more about my services</a>
		</footer>
	</article>
</div>

<!-- Portfolio -->
<div class="wrapper style3">
	<article id="portfolio">
		<header>
			<h2>Here’s some stuff I made recently.</h2>
			<p>Proin odio consequat  sapien vestibulum consequat lorem dolore feugiat lorem ipsum dolore.</p>
		</header>
		<div class="container">
			<div class="row">
				@foreach($models as $model)
					<div class="4u ">
					<article class="image fit box">
	{{HTML::image("images/models/".$model->album->after_photo, $model->name.' after permanent makeup', array('class'=>'image current'))}}
	{{HTML::image("images/models/".$model->album->after_photo, $model->name.' after permanent makeup', array('class'=>'image after','style'=>'display:none;'))}}
	{{HTML::image("images/models/".$model->album->before_photo, $model->name.' before permanent makeup', array('class'=>'image before','style'=>'display:none;'))}}
							<h2>{{$model->name}}</h2>
					</article>
				</div>
				@endforeach
			</div>
		</div>
		<footer>
			<p>Lorem ipsum dolor sit sapien vestibulum ipsum primis?</p>
			<a href='{{URL::route('home.myworks.get')}}' class='button big'> My works gallery </a>
		</footer>
	</article>
</div>
@stop