@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	@include('flash::message')
	<div class="body projects-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<h2>{{$project->title_ua}}</h2>
		<p>Создан - {{$project->created_at}}</p>

		<h3>Новости проекта</h3>
		<div class="project_articles">
			@forelse($articles as $article)
				@foreach($article->content as $content)
					@include('admin.articles._article_for_list')
				@endforeach
			@empty
				<p>К сожалению, новостей пока нет.</p>
			@endforelse
		</div>
		<div class="actions">
			<a href="{{route('edit_project', ['project' => $project->project_id])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Изменить
			</a>
			{!! Form::open(['url' => "/admin/projects/$project->project_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
				{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
			{!! Form::close() !!}
		</div>
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



