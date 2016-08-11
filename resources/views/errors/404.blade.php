@extends('pages.layout')
@extends('pages.partials.header')
@extends('pages.partials.footer')

@section('meta')
	<title>@lang('navigation.about') - ГО Смарт</title>
	<meta name="title" content="@lang('navigation.about') - ГО Смарт, СмартUp">
	<meta name="keywords" content="@lang('navigation.about') - ГО Смарт, СмартUp">
	<meta name="description" content="@lang('navigation.about') - ГО Смарт, СмартUp">
@stop

@section('body')
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="errors-page">
				<div class="main_block">
					<h1>@lang('general.404')</h1>
				</div>
			</div>
		</div>
	</div>
@stop



