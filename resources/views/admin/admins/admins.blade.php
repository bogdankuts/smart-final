@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	@include('flash::message')
	<div class="body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@foreach($admins as $admin)
			<div class="admin-card mdl-card mdl-shadow--2dp">
				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text">Администратор</h2>
				</div>
				<div class="mdl-card__supporting-text">
					<table class="mdl-data-table mdl-js-data-table">
						<tbody>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Логин</th>
							<th>{{$admin->name}}</th>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Дата добавления</td>
							<td>{{$admin->created_at}}</td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Заходил последний раз</td>
							<td>{{$admin->last_visit}}</td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Мастер-админ</td>
							<td>{{$admin->present()->master}}</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="mdl-card__menu">
					<button id="{{$admin->id}}-menu-trigger"
							class="mdl-button mdl-js-button mdl-button--icon">
						<i class="material-icons">more_vert</i>
					</button>
					<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
						for="{{$admin->id}}-menu-trigger">
						<a href="{{route('admin', ['admin' => $admin->id])}}" class="mdl-menu__item">
							Просмотр
						</a>
						<a href="{{route('edit_admin', ['admin' => $admin->id])}}" class="mdl-menu__item">
							Изменить
						</a>
						{!! Form::open(['url' => "/admin/admins/$admin->id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
							{!! Form::submit('Удалить', ['class' => 'mdl-menu__item delete_admin']) !!}
						{!! Form::close() !!}
					</ul>
				</div>
			</div>
		@endforeach
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_admin')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить администратора
		</div>
	</div>
@stop



