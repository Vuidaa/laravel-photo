@extends('defaults.layout')

@section('title')
	services title
@stop

@include('defaults.nav-link')

@section('content')
<div class="wrapper style2">
	<article id="work">
		<header>
			<h2>Here's all the stuff I do.</h2>
			<p>Odio turpis amet sed consequat eget posuere consequat.</p>
		</header>
		<div class="container">
			<div class="row">
				<div class="12u">
					<div class='service'>
						<div class='row'>
							<div class='7u'>
								<span class="image fit"><img src="images/site/lips.jpg" alt="" /></span>
							</div>
							<div class='5u'>
								<h2> Lips line</h2>
								<b> Describe: </b>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<b> Price: </b>
								<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>
					</div>
					<div class='service'>
						<div class='row'>
							<div class='7u'>
								<span class="image fit"><img src="images/site/eye.jpg" alt="" /></span>
							</div>
							<div class='5u'>
								<h2> Eyebrow</h2>
								<b> Describe: </b>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<b> Price: </b>
								<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>
@stop