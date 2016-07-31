@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body profiles-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@forelse($profiles as $profile)
			@foreach($profile->content as $content)
				@include('admin.profiles._profile_for_list')
			@endforeach
		@empty
			<p>Вы еще не добавляли профайлы.</p>
		@endforelse
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_profile')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить профайл
		</div>
	</div>
@stop



