@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.index') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.index') - ГО Смарт">
	<meta name="keywords" content="@lang('navigation.index') - ГО Смарт">
	<meta name="description" content="@lang('navigation.index') - ГО Смарт">
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="index-page @if(App::getLocale() === 'ru') ru @endif">
				<div class="main_block">
					<div class="nav_block last_article active">
						<h1 class="heading">{{$lastArticleTitle}}</h1>
						<p class="description">{{$lastArticleDescription}}</p>
						<a href="{{route('article', ['article' => $lastArticleSlug, 'lang' => App::getLocale()])}}" class="btn more_btn">@lang('general.more')</a>
					</div>
					<div class="nav_block articles_more">
						<div class="loader">
							<i class="fi flaticon-spinner-of-dots"></i>
						</div>
						<a href="{{route('articles', ['lang' => App::getLocale()])}}" class="btn more_btn">@lang('general.more')</a>
					</div>
					<div class="nav_block opportunities col-lg-12">
						<div class="opp_block col-lg-2 col-lg-offset-2">
							<div class="icon">
								<i class="fi flaticon-event-on-day-10"></i>
							</div>
							<a href="{{route('opportunity_group', ['type' => 'event', 'lang' => App::getLocale()])}}" class="btn more_btn">@lang('opportunities.event')</a>
						</div>
						<div class="opp_block col-lg-2 col-lg-offset-1">
							<div class="icon">
								<i class="fi flaticon-certificate"></i>
							</div>
							<a href="{{route('opportunity_group', ['type' => 'grant', 'lang' => App::getLocale()])}}" class="btn more_btn">@lang('opportunities.grant')</a>
						</div>
						<div class="opp_block col-lg-2 col-lg-offset-1">
							<div class="icon">
								<i class="fi flaticon-medal"></i>
							</div>
							<a href="{{route('opportunity_group', ['type' => 'challenge', 'lang' => App::getLocale()])}}" class="btn more_btn">@lang('opportunities.challenge')</a>
						</div>
					</div>
					<div class="nav_block projects col-lg-12">
						@foreach($fields as $field)
							<div class="opp_block col-lg-2
								@if ($field->field_id == 1)
									col-lg-offset-2
								@else
									col-lg-offset-1
								@endif
								"
							>
								<div class="icon">
									<i class="fi flaticon-expand"></i>
								</div>
								<a href="{{route('field', ['field' => $field->field_id, 'lang' => App::getLocale()])}}" class="btn more_btn">
									@if(App::getLocale() === 'ua')
										{{$field->title_ua}}
									@elseif(App::getLocale() === 'ru')
										{{$field->title_ru}}
									@endif
								</a>
							</div>
						@endforeach
					</div>
					<div class="nav_block about col-lg-12">
						<div class="opp_block col-lg-2 col-lg-offset-2">
							<div class="icon">
								<i class="fi flaticon-history-clock-button"></i>
							</div>
							<a href="{{route('about', ['type' => 'story', 'lang' => App::getLocale()])}}" class="btn more_btn">@lang('index_page.story')</a>
						</div>
						<div class="opp_block col-lg-2 col-lg-offset-1">
							<div class="icon">
								<i class="fi flaticon-check-box"></i>
							</div>
							<a href="{{route('about', ['type' => 'reports','lang' => App::getLocale()])}}" class="btn more_btn">@lang('index_page.reports')</a>
						</div>
						<div class="opp_block col-lg-2 col-lg-offset-1">
							<div class="icon">
								<i class="fi flaticon-command"></i>
							</div>
							<a href="{{route('about', ['type' => 'team','lang' => App::getLocale()])}}" class="btn more_btn">@lang('index_page.team')</a>
						</div>
					</div>
				</div>
				@include('pages.partials._short_about')
			</div>
		</div>
	</div>
@stop



