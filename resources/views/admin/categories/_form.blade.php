<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title_ua') ? ' is-invalid' : '' }}">
	{!! Form::label('title_ua', 'Название(укр)', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::text('title_ua', old('title_ua'), ['class'=>'mdl-textfield__input', 'id' => 'title_ua', 'required']) !!}
</div>
@if ($errors->has('title_ua'))
	<span class="help-block">
		<strong>{{ $errors->first('title_ua') }}</strong>
	</span>
@endif
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title_ru') ? ' is-invalid' : '' }}">
	{!! Form::label('title_ru', 'Название(рус)', ['class' => 'mdl-textfield__label']) !!}
	{!! Form::text('title_ru', old('title_ru'), ['class'=>'mdl-textfield__input', 'id' => 'title_ru', 'required']) !!}
</div>
@if ($errors->has('title_ru'))
	<span class="help-block">
		<strong>{{ $errors->first('title_ru') }}</strong>
	</span>
@endif

<div class="add_entity">
	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
		{{$submitButton}}
	</button>
</div>