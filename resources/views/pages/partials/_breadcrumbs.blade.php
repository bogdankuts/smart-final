<div class="breadcrumbs">
	<ul>
		<li>
			<a href="{{route('index', ['lang' => App::getLocale()])}}">@lang('navigation.index')</a>
		</li>
		@if(\Route::currentRouteName() === 'opportunity')
			<li>
				<a href="{{route('opportunity_group', ['type' => 'event', 'lang' => App::getLocale()])}}">@lang('navigation.opportunities')</a>
			</li>
		@endif
		@if(\Route::currentRouteName() === 'project_text')
			<li>
				<a href="{{route('field', ['field' => 1, 'lang' => App::getLocale()])}}">@lang('navigation.projects')</a>
			</li>
		@endif
		@if(\Route::currentRouteName() === 'story')
			<li>
				<a href="{{route('about_project', ['type' => 'about', 'lang' => App::getLocale()])}}">@lang('navigation.projects')</a>
			</li>
		@endif
		<li>
			<p>@lang('navigation.news')</p>
		</li>
	</ul>
</div>