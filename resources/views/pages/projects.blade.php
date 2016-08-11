@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.projects') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.projects') - ГО Смарт, СмартUp">
	<meta name="keywords" content="@lang('navigation.projects') - ГО Смарт, СмартUp">
	<meta name="description" content="@lang('navigation.projects') - ГО Смарт, СмартUp">
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="projects-page">
				<div class="main_block">
					<div class="sidebar col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<ul class="sidebar_list">
							@foreach($fields as $field)
								<li @if($field->field_id == $currentField) class="active" @endif>
									<div class="icon">
										<i class="fi flaticon-expand"></i>
									</div>
									<a href="{{route('field', ['field' => $field->field_id, 'lang' => App::getLocale()])}}" class="text">
										@if(App::getLocale() === 'ua')
											{{$field->title_ua}}
										@else
											{{$field->title_ru}}
										@endif
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="news_list projects-list col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<p class="about">
							@if($currentField == 1)
								@lang('projects.smartUp')
							@elseif($currentField == 2)
								@lang('projects.smartMind')
							@else
								@lang('projects.smartGo')
							@endif
						</p>
						<div class="projects">
							@if(!$projects->isEmpty())
								<h2 class="heading">@lang('projects.heading')</h2>
							@else
								<h2 class="heading">@lang('projects.heading_soon')</h2>
							@endif
							@foreach($projects as $project)
								@if(App::getLocale() === 'ua')
									<a href="{{route('project', ['field'=> $currentField, 'project' => $project->project_id, 'lang' => App::getLocale()])}}" class="one_project">{{$project->title_ua}}</a>
								@else
									<a href="{{route('project', ['field'=> $currentField, 'project' => $project->project_id, 'lang' => App::getLocale()])}}" class="one_project">{{$project->title_ru}}</a>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



