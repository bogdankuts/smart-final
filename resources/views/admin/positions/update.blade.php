@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('css')
	{!! Html::style('js/vendor/date-time/css/datepicker.css') !!}
@stop

@section('body')
	<div class="body profile-create-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::model($position, ['url' => "/admin/positions/$position->position_id", 'method' => 'put', 'class' => 'create_form', 'files' => 'true']) !!}
			@include('admin.positions._update_form')
		{!! Form::close() !!}
		{!! Form::open(['url' => "/admin/positions/$position->position_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
			{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
		{!! Form::close() !!}
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_position')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить вакансию
		</div>
	</div>
@stop

@section('js')
	{!! Html::script('js/vendor/date-time/js/datepicker.js') !!}
@stop



