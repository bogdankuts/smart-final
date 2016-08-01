@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body profile-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<div class="main_info">
			<p class="created_by">Автор - {{$position->user->name}}</p>
			<p class="created_at">Добавлен - {{$position->created_at}}</p>
			<p class="created_at">Последние изменения - {{$position->updated_at}}</p>
			@if($position->published_at < \Carbon\Carbon::today())
				<p class="published">Опубликован</p>
			@else
				<p class="published">Будет опубликован {{$position->published_at}}</p>
			@endif
			<p class="views">Просмотров - {{$position->views}}</p>
		</div>
		@foreach($position->content as $content)
			<div class="profile mdl-shadow--2dp mdl-cell mdl-cell--6-col">
				<p class="lang">{{$content->language->title}}</p>
				<h2 class="name">{{$content->title}}</h2>
				<p class="description">{{$content->description}}</p>
				<a href="{{'/files/profiles/'.$content->file}}" class="view_file" target="_blank">Посомтреть файл</a>
			</div>
		@endforeach
		<div class="actions">
			<a href="{{route('edit_position', ['profile' => $position->position_id])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Изменить
			</a>
			{!! Form::open(['url' => "/admin/positions/$position->position_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
				{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
			{!! Form::close() !!}
		</div>
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