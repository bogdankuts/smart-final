<div class="profile-card mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title">
		<h2 class="title">{{$content->title}}</h2>
	</div>
	<div class="mdl-card__info">
		<p class="date">Опубликовано - {{$report->published_at->format('d.m.Y в H:i')}}</p>
		<p class="date">Просмотров - {{$report->views}}</p>
	</div>
	<div class="mdl-card__excerpt">
		<p>{{$content->description}}</p>
	</div>
	<div class="mdl-card__actions mdl-card--border">
		<a href="{{route('admin_report', ['profile' => $report->report_id])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Посмотреть
		</a>
		<a href="{{route('edit_report', ['profile' => $report->report_id])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Изменить
		</a>
		{!! Form::open(['url' => "/admin/reports/$report->report_id", 'method' => 'DELETE', 'class' => 'delete_form_btn']) !!}
			{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
		{!! Form::close() !!}
	</div>
</div>