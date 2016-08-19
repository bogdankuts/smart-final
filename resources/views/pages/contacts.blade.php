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
			<div class="contacts-page">
				<div class="main_block col-lg-12">
					<div class="contacts col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="mail">
							<div class="icon">
								<i class="fi flaticon-envelope"></i>
							</div>
							<a href="mailto:smart@ngosmart.com.ua" class="link">smart@ngosmart.com.ua</a>
						</div>
						<div class="phone">
							<div class="icon">
								<i class="fi flaticon-phone-call"></i>
							</div>
							<p class="link phone_link">+38 099-401-79-12</p>
							<p class="link phone_link person">@lang('general.contact_person')</p>
						</div>
					</div>
					<div class="map col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<iframe width="100%" height="205" frameborder="0" style="border:0"
								src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ3T0qlktn3EAR4GouiHppjTo&key=AIzaSyBmPVj3HWmcTL8Ut_Za_JNvb6BB8H2jn6A"
								allowfullscreen>
						</iframe>
					</div>
					@include('pages.partials._short_about')
				</div>
			</div>
		</div>
	</div>
@stop



