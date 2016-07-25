<div class="article-card mdl-card mdl-shadow--2dp">
	<div class="mdl-card__image">
		<img src="{{public_path().'/img/articles/'.$article->image}}" alt="{{$article->title}}">
	</div>
	<div class="mdl-card__title">
		<h2 class="title">{{$content->title}}</h2>
	</div>
	<div class="mdl-card__info">
		<p class="date">Опубликовано - {{$article->published_at->format('d.m.Y в H:i')}}</p>
		<p class="created_by">Автор - {{$article->user->name}}</p>
	</div>
	<div class="mdl-card__excerpt">
		<p>{{$content->preview_text}}</p>
	</div>
	<div class="mdl-card__actions mdl-card--border">
		<a href="{{route('admin_article', ['article' => $article->slug])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Посмотреть
		</a>
		<a href="{{route('edit_article', ['article' => $article->slug])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Изменить
		</a>
		{!! Form::open(['url' => "/admin/articles/$article->slug", 'method' => 'DELETE', 'class' => 'delete_form_btn']) !!}
			{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
		{!! Form::close() !!}
	</div>
</div>