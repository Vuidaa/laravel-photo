@extends('defaults.layout')

@section('title')
 works title
@stop

@include('defaults.nav-link')

@section('content')
	<div class='wrapper style3'>
		<article  id='portfolio'>
			<header>
				<h2> My works </h2>
				<p> Collection mof my works.</p>
			</header>
				<div class='container'>
					@foreach(array_chunk($models->getCollection()->all(), 2) as $chunk)
					    <div class="row">
					        @foreach ($chunk as $model)
					            <div class="6u">
									<article class="image fit box model-wrap">
										<h3>{{$model->name}}</h3>
										<small> Date : {{substr($model->created_at, 0, 10)}}</small>						
										<div class='rollover'>
{{HTML::image("images/models/".$model->album->after_photo, $model->name.' after permanent makeup', array('class'=>'current'))}}

{{HTML::image("images/models/".$model->album->after_photo, $model->name.' after permanent makeup', array('class'=>' after','style'=>'display:none;'))}}

{{HTML::image("images/models/".$model->album->before_photo, $model->name.' before permanent makeup', array('class'=>' before','style'=>'display:none;'))}}

{{HTML::image("images/models/".$model->album->main_photo, 'Permanent makeup comparison', array('class'=>'','style'=>'display:none;'))}}
										</div>		
										<small> Photos: </small>
										<div class='models-thumbs'>
<a title="{{$model->name}}" class='colorbox-gallery' rel="{{$model->slug}}" href={{"images/models/".$model->album->before_photo}} >
	{{HTML::image("images/models/".$model->album->before_photo, $model->name.' before permanent makeup')}}
</a>

<a title="{{$model->name}}" class='colorbox-gallery' rel="{{$model->slug}}" href={{"images/models/".$model->album->after_photo}} >
	{{HTML::image("images/models/".$model->album->after_photo, $model->name.' after permanent makeup')}}
</a>

<a title="{{$model->name}}" class='colorbox-gallery' rel="{{$model->slug}}" href={{"images/models/".$model->album->main_photo}} >
	{{HTML::image("images/models/".$model->album->main_photo, $model->name.'Permanent makeup comparison')}}
</a>
										</div>
										<p> {{$model->description}}</p>
									</article>
								</div>
					        @endforeach
					    </div>
					@endforeach
				</div>
		</article>
		{{$models->links()}}
	</div>
@stop