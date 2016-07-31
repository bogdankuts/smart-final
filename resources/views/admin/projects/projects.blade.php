@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	@include('flash::message')
	<div class="body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@foreach($fields as $field)
			<div class="projects_field">
				<h2>{{$field->title_ru}}</h2>
				@forelse($projects as $project)
					@if ($project->field->field_id === $field->field_id)
						<div class="admin-card mdl-card mdl-shadow--2dp">
							<div class="mdl-card__title">
								<h2 class="mdl-card__title-text">Проект</h2>
							</div>
							<div class="mdl-card__supporting-text">
								<table class="mdl-data-table mdl-js-data-table">
									<tbody>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">Название</th>
										<th>{{$project->title_ua}}</th>
									</tr>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">Добавлен</th>
										<th>{{$project->created_at}}</th>
									</tr>
									</tbody>
								</table>
							</div>
							<div class="mdl-card__menu">
								<button id="{{$project->project_id}}-menu-trigger"
										class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
									<i class="material-icons">more_vert</i>
								</button>
								<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
									for="{{$project->project_id}}-menu-trigger">
									<a href="{{route('admin_project', ['project' => $project->project_id])}}" class="mdl-menu__item">
										Просмотр
									</a>
									<a href="{{route('edit_project', ['project' => $project->project_id])}}" class="mdl-menu__item">
										Изменить
									</a>
									{!! Form::open(['url' => "/admin/projects/$project->project_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
									{!! Form::submit('Удалить', ['class' => 'mdl-menu__item delete_admin']) !!}
									{!! Form::close() !!}
								</ul>
							</div>
						</div>
					@endif
				@empty
					<p>Проектов еще нет</p>
				@endforelse
			</div>
		@endforeach
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



