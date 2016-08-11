<div class="subscriber mdl-shadow--2dp mdl-cell mdl-cell--6-col">
{{--	<p class="name">Имя - {{$subscriber->name}}</p>--}}
	<a href="mailto:{{$subscriber->email}}" class="email">Email - {{$subscriber->email}}</a>
	<p class="name">Подписан с - {{$subscriber->created_at->format('d.m.Y')}}</p>
	{!! Form::open(['url' => "/admin/subscribers/$subscriber->subscriber_id", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
	{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent delete_btn']) !!}
	{!! Form::close() !!}
</div>