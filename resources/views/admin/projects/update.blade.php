@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body project-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::model($project, ['url' => "/admin/projects/$project->project_id", 'method' => 'put', 'class' => 'create_form']) !!}
			@include('admin.projects._form')
		{!! Form::close() !!}
		{!! Form::open(['url' => "/admin/projects/$project->project_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
		{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
		{!! Form::close() !!}
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_project')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить проект
		</div>
	</div>
@stop



