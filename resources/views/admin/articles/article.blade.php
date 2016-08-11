@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body one-article-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<div class="main_info">
			<p class="created_by">Автор - {{$article->user->name}}</p>
			<p class="created_at">Добавлен - {{$article->created_at}}</p>
			<p class="created_at">Последние изменения - {{$article->updated_at}}</p>
			<p class="created_at">Категория - {{$article->getType()}}</p>
			@if($article->type_id === 5)
				<p class="created_at">Проект - {{$article->getProject()}}</p>
			@endif
			@if($article->published_at < \Carbon\Carbon::today())
				<p class="published">Опубликована</p>
			@else
				<p class="published">Будет опубликована {{$article->published_at}}</p>
			@endif
			<p class="views">Просмотров - {{$article->views}}</p>
		</div>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
			<div class="mdl-tabs__tab-bar">
				@unless(is_null($ukr))
					<a href="#ua" class="mdl-tabs__tab is-active">Украинский</a>
				@endunless
				@unless(is_null($rus))
					<a href="#ru" class="mdl-tabs__tab">Русский</a>
				@endunless
			</div>
			@unless(is_null($ukr))
				<div class="mdl-tabs__panel is-active" id="ua">
					<h4>Украинский</h4>
					<div class="ua">
						<h3>{{$ukr->title}}</h3>
						<div class="body">{!! $ukr->body!!}</div>
					</div>
					<div class="links">
						<a href="{{route('article', ['article' => $article->slug])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
							Посмотреть на сайте
						</a>
					</div>
				</div>
			@endunless
			@unless(is_null($rus))
				<div class="mdl-tabs__panel" id="ru">
					<h3>Русский</h3>
					<div class="ru">
						<h3>{{$rus->title}}</h3>
						<div class="body">{!! $rus->body!!}</div>
					</div>
					<div class="links">
						<a href="{{route('article', ['article' => $article->slug])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
							Посмотреть на сайте
						</a>
					</div>
				</div>
			@endunless
		</div>
		<div class="actions">
			<a href="{{route('edit_article', ['article' => $article->slug])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Изменить
			</a>
			{!! Form::open(['url' => "/admin/articles/$article->slug", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
				{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
			{!! Form::close() !!}
		</div>
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_article')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить новость
		</div>
	</div>
@stop



