@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>{{$content->title}} - ГО Смарт</title>
	<meta name="title" content="{{$content->meta_title}}">
	<meta name="keywords" content="{{$content->meta_keywords}}">
	<meta name="description" content="{{$content->meta_description}}">
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="article-page">
				@include('pages.partials._breadcrumbs')
				<div class="main_block col-lg-12">
					<h1 class="heading">{{$content->title}}</h1>
					<div class="article_body">
						{!! $content->body !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



