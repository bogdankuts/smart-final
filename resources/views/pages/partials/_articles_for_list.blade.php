<div class="one_article col-lg-4 col-md-4 col-sm-4 col-xs-12">
	<div class="content">
		<div class="heading">
			<p class="heading_text">{{$content->title}}</p>
		</div>
		<div class="date">
			<p>{{$content->article->published_at->format('d.m.Y')}}</p>
		</div>
		<div class="img">
			<img src="{{'/img/articles/'.$content->article->image}}" alt="{{$content->title}}">
		</div>
		<div class="excerpt">
			<p>{{$content->preview_text}}</p>
		</div>
		<div class="actions">
			@if(\Route::currentRouteName() === 'articles')
				<a href="{{route('article', ['article' => $content->article->slug, 'lang' => App::getLocale()])}}" class="btn">@lang('general.more')</a>
			@elseif(\Route::currentRouteName() === 'opportunity_group')
				<a href="{{route('opportunity', ['article' => $content->article->slug, 'type' => 'event', 'lang' => App::getLocale()])}}" class="btn">@lang('general.more')</a>
			@elseif(\Route::currentRouteName() === 'project')
				<a href="{{route('project_text', ['article' => $content->article->slug, 'field' => $currentField, 'project' => $project->project_id, 'lang' => App::getLocale()])}}" class="btn">@lang('general.more')</a>
			@elseif(\Route::currentRouteName() === 'about_project')
				<a href="{{route('story', ['article' => $content->article->slug, 'type' => $type, 'lang' => App::getLocale()])}}" class="btn">@lang('general.more')</a>
			@endif
		</div>
	</div>
</div>