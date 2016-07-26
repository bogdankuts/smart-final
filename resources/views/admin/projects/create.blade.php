@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body project-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::open(['url' => '/admin/projects', 'method' => 'POST', 'class' => 'create_form']) !!}
			@include('admin.projects._form')
		{!! Form::close() !!}
	</div>
@stop



