@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.news') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.news') - ГО Смарт, СмартUp">
	<meta name="keywords" content="@lang('navigation.news') - ГО Смарт, СмартUp">
	<meta name="description" content="@lang('navigation.news') - ГО Смарт, СмартUp">
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="articles-page">
				<div class="main_block">
					<div class="news_list col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
						@foreach($contents as $content)
							@if($content->article->published_at < \Carbon\Carbon::now())
								@include('pages.partials._articles_for_list')
							@endif
						@endforeach
						<div class="pagination_block col-lg-12">
							{{$contents->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



