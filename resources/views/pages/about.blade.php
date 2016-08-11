@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.about') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.about') - ГО Смарт, СмартUp">
	<meta name="keywords" content="@lang('navigation.about') - ГО Смарт, СмартUp">
	<meta name="description" content="@lang('navigation.about') - ГО Смарт, СмартUp">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="projects-page">
				<div class="main_block">
					<div class="sidebar col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<ul class="sidebar_list">
							<li @if($type === 'story') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-history-clock-button"></i>
								</div>
								<a href="{{route('about', ['type' => 'story', 'lang' => App::getLocale()])}}" class="text">@lang('index_page.story')</a>
							</li>
							<li @if($type === 'reports') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-check-box"></i>
								</div>
								<a href="{{route('about', ['type' => 'reports', 'lang' => App::getLocale()])}}" class="text">@lang('index_page.reports')</a>
							</li>
							<li @if($type === 'team') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-command"></i>
								</div>
								<a href="{{route('about', ['type' => 'team', 'lang' => App::getLocale()])}}" class="text">@lang('index_page.team')</a>
							</li>
						</ul>
					</div>
					<div class="news_list projects-list col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<div class="about">
							@if($type === 'story')
								<div class="about_text">@lang('about.story')</div>
							@elseif($type === 'team')
								<div class="team_text">@lang('about.team')</div>
							@elseif($type === 'reports')
								<div class="all_reports">
									@if (count($reports) > 0)
										<div class="reports col-lg-6">
											<h2 class="heading">@lang('about.reports_heading')</h2>
											@foreach($reports as $contents)
												@foreach($contents as $content)
													<div class="one_report">
														<a href="{{'/files/reports/'.$content->file}}" class="report_link js_increment"
														   data-link="/increment-views-report/{{$content->report->report_id}}">
															{{$content->title}}
														</a>
														<p class="small_description">{{$content->description}}</p>
													</div>
												@endforeach
											@endforeach
										</div>
									@endif
									@if (count($docs) > 0)
										<div class="docs col-lg-6">
											<h2 class="heading">@lang('about.docs_heading')</h2>
											@foreach($docs as $contents)
												@foreach($contents as $content)
													<div class="one_report">
														<a href="{{'/files/reports/'.$content->file}}" class="report_link js_increment"
														   data-link="/increment-views-report/{{$content->report->report_id}}">
															{{$content->title}}
														</a>
														<p class="small_description">{{$content->description}}</p>
													</div>
												@endforeach
											@endforeach
										</div>
									@endif
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



