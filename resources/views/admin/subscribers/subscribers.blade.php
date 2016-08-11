@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body profiles-body subscribers-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@forelse($subscribers as $subscriber)
			@include('admin.subscribers._subscribers_for_list')
		@empty
			<p>Подписчиков еще нет.</p>
		@endforelse
		<div class="actions">
			<a href="{{route('admin_load_subscribers')}}" class= "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Загрузить список (csv)
			</a>
			<a href="{{route('admin_load_subscribers_xls')}}" class= "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Загрузить список (xlsx)
			</a>
		</div>
	</div>
@stop



