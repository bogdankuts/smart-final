@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has(config('localization.flashKey')))
		<p>{!! Session::get(config('localization.flashKey')) !!}</p>
	@endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('index_page.hello')</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
