<div class="profile-card mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title">
		<h2 class="title">{{$content->name}}</h2>
	</div>
	<div class="mdl-card__info">
		<p class="date">Опубликовано - {{$profile->published_at->format('d.m.Y в H:i')}}</p>
		<p class="created_by">Автор - {{$profile->user->name}}</p>
	</div>
	<div class="mdl-card__excerpt">
		<p>{{$content->description}}</p>
	</div>
	<div class="mdl-card__actions mdl-card--border">
		<a href="{{route('admin_profile', ['profile' => $profile->profile_id])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Посмотреть
		</a>
		<a href="{{route('edit_profile', ['profile' => $profile->profile_id])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Изменить
		</a>
		{!! Form::open(['url' => "/admin/profiles/$profile->profile_id", 'method' => 'DELETE', 'class' => 'delete_form_btn']) !!}
			{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
		{!! Form::close() !!}
	</div>
</div>