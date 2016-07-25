<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Логин', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::text('name', old('name'), ['class'=>'mdl-textfield__input', 'id' => 'name']) !!}
</div>
@if ($errors->has('name'))
	<span class="help-block">
		<strong>{{ $errors->first('name') }}</strong>
	</span>
@endif
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? ' has-error' : '' }}">
	{!! Form::label('email', 'E-Mail', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::text('email', old('email'), ['class'=>'mdl-textfield__input', 'id' => 'email']) !!}
</div>
@if ($errors->has('email'))
	<span class="help-block">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
@endif
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? ' has-error' : '' }}">
	{!! Form::label('password', 'Пароль', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::password('password', ['class'=>'mdl-textfield__input', 'id' => 'password']) !!}
</div>
@if ($errors->has('password'))
	<span class="help-block">
		<strong>{{ $errors->first('password') }}</strong>
	</span>
@endif
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	{!! Form::label('password-confirm', 'Подтверждение пароля', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::password('password_confirmation', ['class'=>'mdl-textfield__input', 'id' => 'password-confirm']) !!}
</div>
@if ($errors->has('password_confirmation'))
	<span class="help-block">
		<strong>{{ $errors->first('password_confirmation') }}</strong>
	</span>
@endif
<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="master">
	@if (isset($admin))
		{{ Form::checkbox('master', true, $admin->master, ['class'=>'mdl-switch__input', 'id'=>'master']) }}
	@else
		{{ Form::checkbox('master', true, false, ['class'=>'mdl-switch__input', 'id'=>'master']) }}
	@endif
	<span class="mdl-switch__label">Мастер-админ</span>
</label>
<div class="add_admin">
	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
		{{$submitButton}}
	</button>
</div>