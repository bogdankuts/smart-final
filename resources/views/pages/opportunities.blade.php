@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.news') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.opportunities') - ГО Смарт, СмартUp">
	<meta name="keywords" content="@lang('navigation.opportunities') - ГО Смарт, СмартUp">
	<meta name="description" content="@lang('navigation.opportunities') - ГО Смарт, СмартUp">
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="opportunities-page">
				<div class="main_block">
					<div class="sidebar col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<ul class="sidebar_list">
							<li @if($type === 'event') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-event-on-day-10"></i>
								</div>
								<a href="{{route('opportunity_group', ['type' => 'event', 'lang' => App::getLocale()])}}" class="text">@lang('opportunities.event')</a>
							</li>
							<li @if($type === 'grant') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-certificate"></i>
								</div>
								<a href="{{route('opportunity_group', ['type' => 'grant', 'lang' => App::getLocale()])}}" class="text">@lang('opportunities.grant')</a>
							</li>
							<li @if($type === 'challenge') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-medal"></i>
								</div>
								<a href="{{route('opportunity_group', ['type' => 'challenge', 'lang' => App::getLocale()])}}" class="text">@lang('opportunities.challenge')</a>
							</li>
						</ul>
					</div>
					<div class="news_list col-lg-10 col-md-10 col-sm-12 col-xs-12">
						@foreach($articles as $contents)
							@foreach($contents as $content)
								@if($content->article->published_at < \Carbon\Carbon::now())
									@include('pages.partials._articles_for_list')
								@endif
							@endforeach
						@endforeach
						@if (!emptyArray($articles))
							<div class="pagination_block col-lg-12">
								{{$contents->links()}}
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



