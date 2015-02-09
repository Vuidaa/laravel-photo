@extends('pages.admin.admin-layout')

@section('admin-content')
<div class='row'>
	<div class='col-md-4 col-md-offset-4'>
		<h3> Create new </h3>
	{{Form::model($model, ['route'=>['admin.edit.post', $model->slug],'method'=>'POST','role'=>'form','files'=>'true'])}}
	<div class='form-group'>
		{{Form::label('description','Description:')}}
		{{Form::textarea('description',Input::old('description'),['class'=>'form-control'])}}

		@if($errors->has('description'))
			<div class='alert alert-danger'>{{$errors->first('description')}} </div>
		@endif
	</div>
	<div class='form-group'>
		{{Form::label('main_photo','Main double photo:')}}
		{{HTML::image("images/models/".$model->album->main_photo,null, array('class'=>'img-responsive img-thumbnail'))}}
		{{Form::file('photos[main_photo]',null,['class'=>'form-control'])}}

		@if($errors->has('main_photo'))
			<div class='alert alert-danger'>{{$errors->first('main_photo')}} </div>
		@endif
	</div>
	<div class='form-group'>
		{{Form::label('before_photo','Before photo:')}}
		{{HTML::image("images/models/".$model->album->before_photo,null, array('class'=>'img-responsive img-thumbnail'))}}
		{{Form::file('photos[before_photo]',null,['class'=>'form-control'])}}

		@if($errors->has('before_photo'))
			<div class='alert alert-danger'>{{$errors->first('before_photo')}} </div>
		@endif
	</div>
	<div class='form-group'>
		{{Form::label('after_photo','After photo:')}}
		{{HTML::image("images/models/".$model->album->after_photo,null, array('class'=>'img-responsive img-thumbnail'))}}
		{{Form::file('photos[after_photo]',null,['class'=>'form-control'])}}

		@if($errors->has('after_photo'))
			<div class='alert alert-danger'>{{$errors->first('before_photo')}} </div>
		@endif
	</div>
	<div class='form-group'>
		{{Form::submit('Create',['class'=>'btn btn-lg btn-default'])}}
	</div>
{{Form::close()}}
	</div>
</div>
@stop