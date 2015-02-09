@extends('pages.admin.admin-layout')

@section('admin-content')
	@if(Session::has('message'))
		<div class='alert alert-{{Session::get('message.class')}}'> {{Session::get('message.message')}}</div>
	@endif
<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Name</th><th>Slug</th><th>Description</th><th>Main photo</th><th>Before photo</th><th>After photo</th><th>Date</th><th>Edit</th><th>Delete</th>
		</tr>
	</thead>
	<tbody>

		@foreach($models as $model)
			<tr> 	

				<td>{{$model->name}}</td>
				<td>{{$model->slug}}</td>
				<td id='table-description'><i><small>{{substr($model->description, 0, 30) }}</small></i></td> 

				<td><a href={{"images/models/".$model->album->main_photo}} data-lightbox="{{$model->slug}}" data-title="{{$model->name}}">{{HTML::image("images/models/".$model->album->main_photo, null, array('width'=>'120px','class'=>'img-thumbnail'))}}</a></td>
				<td><a href={{"images/models/".$model->album->before_photo}} data-lightbox="{{$model->slug}}" data-title="{{$model->name}}">{{HTML::image("images/models/".$model->album->before_photo, null, array('width'=>'120px','class'=>'img-thumbnail'))}}</a></td>
				<td><a href={{"images/models/".$model->album->after_photo}} data-lightbox="{{$model->slug}}" data-title="{{$model->name}}">{{HTML::image("images/models/".$model->album->after_photo, null, array('width'=>'120px','class'=>'img-thumbnail'))}}</a></td>
				
				<td>{{$model->created_at}}</td>
				<td><a href='{{URL::route('admin.edit.get', ['slug'=>$model->slug])}}' class='btn btn-success'>Edit</a></td>
				<td>
					{{Form::open(['route'=>['admin.delete.post', $model->slug], 'method'=>'POST','role'=>'form'])}}
						{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
					{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{$models->links()}}
@stop