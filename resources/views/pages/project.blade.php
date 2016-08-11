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
					<div class="sidebar col-lg-2">
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
					<div class="news_list projects-list col-lg-10">
						<div class="projects">
							<h2 class="heading">
								@lang('projects.list_heading')
								@if(App::getLocale() === 'ua')
									{{$project->title_ua}}
								@else
									{{$project->title_ru}}
								@endif
							</h2>
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
	</div>
@stop



