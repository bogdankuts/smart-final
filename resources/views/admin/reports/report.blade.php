@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body profile-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<div class="main_info">
			<p class="created_at">Добавлен - {{$report->created_at}}</p>
			<p class="created_at">Последние изменения - {{$report->updated_at}}</p>
			@if($report->cetegory_id == 1)
				<p class="created_at">Тип - Документ</p>
			@else
				<p class="created_at">Тип - Отчет</p>
			@endif
			@if($report->published_at < \Carbon\Carbon::today())
				<p class="published">Опубликован</p>
			@else
				<p class="published">Будет опубликован {{$report->published_at}}</p>
			@endif
			<p class="views">Просмотров - {{$report->views}}</p>
		</div>
		@foreach($report->content as $content)
			<div class="profile mdl-shadow--2dp mdl-cell mdl-cell--6-col">
				<p class="lang">{{$content->language->title}}</p>
				<h2 class="name">{{$content->name}}</h2>
				<p class="description">{{$content->description}}</p>
				<a href="{{'/files/reports/'.$content->file}}" class="view_file" target="_blank">Посомтреть файл</a>
			</div>
		@endforeach
		<div class="actions">
			<a href="{{route('edit_report', ['profile' => $report->report_id])}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
				Изменить
			</a>
			{!! Form::open(['url' => "/admin/reports/$report->report_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
				{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
			{!! Form::close() !!}
		</div>
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_report')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить отчет
		</div>
	</div>
@stop