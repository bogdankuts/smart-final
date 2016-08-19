@section('footer')
	<div class="container">
		<div class="row">
			<footer>
				<div class="partners col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-12 col-sm-offset-0">
					<p class="footer_heading footer_heading--partners">@lang('footer.partners')</p>
					<div class="images">
						<img src="{{asset('img/markup/partner2.png')}}" alt="" class="partner_1">
						<img src="{{asset('img/markup/partner1.png')}}" alt="" class="partner_2">
					</div>
				</div>
				<div class="donate col-lg-4 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-sm-offset-0">
					<p class="footer_heading footer_heading--donate">@lang('footer.donate')</p>
					<a href="{{route('donate', ['lang' => App::getLocale()])}}" class="btn donate_btn">@lang('footer.donate_btn')</a>
				</div>
				<div class="subscribe col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-12 col-sm-offset-0" >
					<p class="footer_heading footer_heading--subscribers">@lang('footer.subscribe')</p>
					<div class="form">
						{!! Form::open(['url' => "/subscribe/".App::getLocale(), 'method' => 'POST']) !!}
						{!! Form::email('email', null, ['placeholder' => trans('footer.subscribe_placeholder'), 'class'	=> 'email_input']) !!}
						{!! Form::submit(trans('footer.subscribe_btn'), ['class' => 'subscribe_btn btn']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<div class="copy col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
					<p class="copy_text">@lang('footer.copy') <span class="js_years">2016</span></p>
				</div>
			</footer>
		</div>
	</div>
@stop