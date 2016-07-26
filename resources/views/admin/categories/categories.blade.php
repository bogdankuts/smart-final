@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	@include('flash::message')
	<div class="body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@foreach($categories as $category)
			<div class="one_category mdl-card">
				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text">
						<a href="{{route('admin_category', ['category' => $category->category_id])}}">
							{{$category->title}}
						</a>
					</h2>
					<div class="actions">
						<a href="{{route('edit_category', ['category' => $category->category_id])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
							Изменить
						</a>
						{!! Form::open(['url' => "/admin/categories/$category->category_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
						{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		@endforeach
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



