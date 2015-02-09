<!-- Contact -->
<div class="wrapper style4">
	<article id="contact" class="container 100%">
		<header>
			<h2>My contact details.</h2>
			<p>Ornare nulla proin odio consequat sapien vestibulum ipsum sed lorem.</p>
		</header>
		<div>
			<div class="row">
				<div class="5u">
					<h3> Visit me </h3>
					 <address >
					 	 <b>Address: </b><br>
					 	 London,<br>
					 	 United Kingdom<br><br>
					 	 <b> Phone: </b><br>
					 	 	07777554233 <br><br>
					 	 <b> E-mail address </b><br>
					 	 	<a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">somemail@gmail.com</a><br><br>
					 	 <b> Find me on Facebook: </b><br>
					 	 <ul class="social">
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						</ul>
					</address> 
				</div>
				<div class="7u">
					<h3> Or just send me an email.. </h3>
					{{Form::open(['route'=>'home.contact.post','method'=>'POST'])}}
						@if($errors->has())
							@foreach($errors->all() as $error)
								<p class='error'> {{$error}} </p>
							@endforeach
						@endif
						<div>
							<div class="row">
								<div class="6u">
									{{Form::text('name',Input::old('name'),['placeholder'=>'Name'])}}
								</div>
								<div class="6u">
									{{Form::text('email',Input::old('email'),['placeholder'=>'Email'])}}
								</div>
							</div>
							<div class="row">
								<div class="12u">
									{{Form::text('subject',Input::old('subject'),['placeholder'=>'Subject'])}}
								</div>
							</div>
							<div class="row">
								<div class="12u">
									{{Form::textarea('message',Input::old('message'),['placeholder'=>'Message'])}}
								</div>
							</div>
							<div class="row 200%">
								<div class="12u">
									<ul class="actions">
										<li>{{Form::submit('Send Message')}}</li>
										<li>{{Form::reset('Clear Form',['class'=>'alt'])}}</li>
									</ul>
								</div>
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</article>
</div>