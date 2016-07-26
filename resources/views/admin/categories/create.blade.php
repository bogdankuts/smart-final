@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body category-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::open(['url' => '/admin/categories', 'method' => 'POST', 'class' => 'create_form']) !!}
			@include('admin.categories._form')
		{!! Form::close() !!}
	</div>
@stop



