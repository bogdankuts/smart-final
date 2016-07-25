@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@forelse($articles as $article)
			@foreach($article->content as $content)
				@include('admin.articles._article_for_list')
			@endforeach
		@empty
			<p>Вы еще не добавляли статьи.</p>
		@endforelse
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



