<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title') ? ' has-error' : '' }}">
	{!! Form::label('title', 'Название', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::text('title', old('title'), ['class'=>'mdl-textfield__input', 'id' => 'title', 'required']) !!}
</div>
@if ($errors->has('title'))
	<span class="help-block">
		<strong>{{ $errors->first('title') }}</strong>
	</span>
@endif

<div class="add_entity">
	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
		{{$submitButton}}
	</button>
</div>