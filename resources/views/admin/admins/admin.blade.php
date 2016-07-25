@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<h2 class="main_heading">Администратор - {{$admin->name}}</h2>
		<h4 class="main_heading">Общие сведения</h4>
		<div class="general card mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset">
			<p class="created">Создан - {{$admin->created_at}}</p>
			<p class="last_visit">Последний визит - {{$admin->present()->last_visit}}</p>
			<p class="master">Мастер - {{$admin->present()->master}}</p>
			<p class="articles_amount">Всего статей - {{count($articles)}}</p>
			<p class="articles_amount">Всего вакансий - {{count($positions)}}</p>
			<p class="articles_amount">Всего профайлов - {{count($profiles)}}</p>
		</div>
		@if(count($articles) > 0)
			<div class="articles_by_admin card mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
				<h4 class="main_heading">Статьи этого админа</h4>
				@foreach($articles as $article)
					<div>{{$article->content->body}}</div>
				@endforeach
			</div>
		@endif
		@if(count($positions) > 0)
			<div class="positions_by_admin card mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
				<h4 class="main_heading">Вакансии этого админа</h4>
				@foreach($positions as $position)
					<div>{{$position->content->title}}</div>
				@endforeach
			</div>
		@endif
		@if(count($profiles) > 0)
			<div class="profiles_by_admin card mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
				<h4 class="main_heading">Профайлы этого админа</h4>
				@foreach($profiles as $profile)
					<div>{{$profile->content->name}}</div>
				@endforeach
			</div>
		@endif
		<div class="actions">
			<a href="{{route('edit_admin', ['admin' => $admin->id])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Изменить
			</a>
			{!! Form::open(['url' => "/admin/admins/$admin->id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
				{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
			{!! Form::close() !!}
		</div>
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



