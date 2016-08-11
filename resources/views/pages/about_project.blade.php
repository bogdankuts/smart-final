@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.aboutProject') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.aboutProject') - ГО Смарт, СмартUp">
	<meta name="keywords" content="@lang('navigation.aboutProject') - ГО Смарт, СмартUp">
	<meta name="description" content="@lang('navigation.aboutProject') - ГО Смарт, СмартUp">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="aboutProject-page">
				<div class="main_block">
					<div class="sidebar col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<ul class="sidebar_list">
							<li @if($type === 'about') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-info"></i>
								</div>
								<a href="{{route('about_project', ['type' => 'about', 'lang' => App::getLocale()])}}" class="text">@lang('aboutProject.about')</a>
							</li>
							<li @if($type === 'profiles') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-material"></i>
								</div>
								<a href="{{route('about_project', ['type' => 'profiles', 'lang' => App::getLocale()])}}" class="text">@lang('aboutProject.profiles')</a>
							</li>
							<li @if($type === 'positions') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-people"></i>
								</div>
								<a href="{{route('about_project', ['type' => 'positions', 'lang' => App::getLocale()])}}" class="text">@lang('aboutProject.positions')</a>
							</li>
							<li @if($type === 'stories') class="active" @endif>
								<div class="icon">
									<i class="fi flaticon-people-1"></i>
								</div>
								<a href="{{route('about_project', ['type' => 'stories', 'lang' => App::getLocale()])}}" class="text">@lang('aboutProject.stories')</a>
							</li>
						</ul>
					</div>
					<div class="news_list projects-list col-lg-10 col-md-10 col-sm-12 col-xs-12">
						@if ($type === 'about')
							<div class="about">
								<h2 class="heading">@lang('aboutProject.about_heading')</h2>
								<h4 class="subheading">@lang('aboutProject.about_subheading')</h4>
								<div class="about_block student col-lg-5">
									<div class="icon">
										<i class="fi flaticon-graduation"></i>
									</div>
									<div class="text">
										<div>
											@lang('aboutProject.about_student')
										</div>
									</div>
								</div>
								<div class="about_block employer col-lg-6 col-lg-offset-1">
									<div class="icon">
										<i class="fi flaticon-businessman-outline"></i>
									</div>
									<div class="text">
										<div>
											@lang('aboutProject.about_employer')
										</div>
									</div>
								</div>
							</div>
						@elseif($type === 'profiles')
							<div class="profiles">
								@foreach($categoriesProfiles as $category)
									<div class="category">
										@if(App::getLocale() === 'ua')
											<p class="heading">{{$category->title_ua}}</p>
										@elseif(App::getLocale() === 'ru')
											<p class="heading">{{$category->title_ru}}</p>
										@endif
										@foreach($profiles as $profile)
											@if($profile->profile->category_id == $category->category_id)
												<div class="one_profile">
													<a href="{{'/files/profiles/'.$profile->file}}" class="report_link js_increment"
													   data-link="/increment-views-profile/{{$profile->profile->profile_id}}">
														{{$profile->name}}
													</a>
													<p class="small_description">{{$profile->description}}</p>
												</div>
											@endif
										@endforeach
									</div>
								@endforeach
							</div>
						@elseif($type === 'positions')
							<div class="profiles">
								@foreach($categoriesPositions as $category)
									<div class="category">
										@if(App::getLocale() === 'ua')
											<p class="heading">{{$category->title_ua}}</p>
										@elseif(App::getLocale() === 'ru')
											<p class="heading">{{$category->title_ru}}</p>
										@endif
										@foreach($positions as $position)
											@if($position->position->category_id == $category->category_id)
												<div class="one_profile">
													<a href="{{'/files/positions/'.$position->file}}" class="report_link js_increment"
													   data-link="/increment-views-position/{{$position->position->position_id}}">
														{{$position->title}}
													</a>
													<p class="small_description">{{$position->description}}</p>
												</div>
											@endif
										@endforeach
									</div>
								@endforeach
							</div>
						@elseif($type === 'stories')
							@foreach($stories as $contents)
								@foreach($contents as $content)
									@if($content->article->published_at <= \Carbon\Carbon::now())
										@include('pages.partials._articles_for_list')
									@endif
								@endforeach
							@endforeach
							@if (!emptyArray($stories))
								<div class="pagination_block col-lg-12">
									{{$contents->links()}}
								</div>
							@endif

						@endif
							<input type="hidden" id="_token" value="{{csrf_token()}}">
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



