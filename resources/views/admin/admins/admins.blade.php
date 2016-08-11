@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	@include('flash::message')
	<div class="body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@foreach($admins as $admin)
			@include('admin.admins._admin_for_list')
		@endforeach
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_admin')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить администратора
		</div>
	</div>
@stop



