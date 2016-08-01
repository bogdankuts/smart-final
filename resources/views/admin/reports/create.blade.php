@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('css')
	{!! Html::style('js/vendor/date-time/css/datepicker.css') !!}
@stop

@section('body')
	<div class="body profile-create-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::open(['url' => '/admin/reports', 'method' => 'POST', 'class' => 'create_form', 'files' => 'true']) !!}
			@include('admin.reports._form')
		{!! Form::close() !!}
	</div>
@stop
@section('js')
	{!! Html::script('js/vendor/date-time/js/datepicker.js') !!}
@stop



