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
			<div class="help-page">
				<div class="main_block">
					<h1 class="heading">@lang('donate.heading')</h1>
					<h2 class="subheading">@lang('donate.subheading')</h2>
					<div class="requisites">
						<p class="title">@lang('donate.requisites_name')</p>
						<p class="code">@lang('donate.requisites_code')</p>
						<p class="account">@lang('donate.requisites_account')</p>
						<p class="mfo">@lang('donate.requisites_mfo')</p>
						<p class="goal">@lang('donate.requisites_goal')</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



