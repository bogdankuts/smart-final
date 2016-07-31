@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	@include('flash::message')
	<div class="body category-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<h2>{{$category->title_ua}}</h2>
		<div class="category_positions">
			<h3>Вакансии</h3>
			@forelse($positions as $position)
				@foreach($position->content as $content)
					@include('admin.positions._position_for_list')
				@endforeach
			@empty
				<p class="empty">К сожалению, вакансий пока нет.</p>
			@endforelse
		</div>
		<div class="category_profiles">
			<h3>Резюме</h3>
			@forelse($profiles as $profile)
				@foreach($profile->content as $content)
					@include('admin.profiles._profile_for_list')
				@endforeach
			@empty
				<p class="empty">К сожалению, резюме пока нет.</p>
			@endforelse
		</div>
		<div class="actions">
			<a href="{{route('edit_category', ['category' => $category->category_id])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Изменить
			</a>
			{!! Form::open(['url' => "/admin/categories/$category->category_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
				{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
			{!! Form::close() !!}
		</div>
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_category')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить категорию
		</div>
	</div>
@stop



