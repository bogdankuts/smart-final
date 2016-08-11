<div class="general_info">
	<h2>Общая информация</h2>
	<div class="one_select mdl-cell mdl-cell--6-col">
		{!! Form::label('category_id', 'Выберете категорию', ['class' => 'non_material_label']) !!}
		{!! Form::select('category_id', \App\Http\Help::createOptions($categories, 'category_id', 'title_ua'), null, ['class' =>'form-control select']) !!}
	</div>
	<div class="one_select mdl-cell mdl-cell--6-col {{ $errors->has('published_at') ? 'is-invalid' : '' }}">
		{!! Form::label('published_at', 'Дата публикации', ['class' => 'non_material_label']) !!}
		{!! Form::text('published_at', $position->published_at->format('d.m.Y H:i'), ['id' => 'published_at', 'class' => 'form-control datepicker-here select', 'data-timepicker' => 'true']) !!}
		@if ($errors->has('published_at'))
			<span class="help-block">
				<strong>{{ $errors->first('published_at') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
	<div class="mdl-tabs__tab-bar">
		<a href="#ua" class="mdl-tabs__tab is-active">Украинский</a>
		<a href="#ru" class="mdl-tabs__tab">Русский</a>
	</div>

	<div class="mdl-tabs__panel is-active" id="ua">
		<h3>Украинский</h3>
		<div class="ua">
			@if(!is_null($ukr))
				<div class="meta">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_title', 'Meta-title', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_title[ua]', $ukr->meta_title, ['class'=>'mdl-textfield__input', 'id' => 'meta_title', 'max' => '80']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_keywords', 'Meta-keywords', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_keywords[ua]', $ukr->meta_keywords, ['class'=>'mdl-textfield__input', 'id' => 'meta_keywords', 'max' => '250']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_description', 'Meta-description', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_description[ua]',$ukr->meta_description, ['class'=>'mdl-textfield__input', 'id' => 'meta_description', 'max' => '200']) !!}
					</div>
				</div>
				<div class="info">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('title', 'Название', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('title[ua]', $ukr->title, ['class'=>'mdl-textfield__input', 'id' => 'title']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('description', 'Описание', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('description[ua]', $ukr->description, ['class'=>'mdl-textfield__input', 'id' => 'description']) !!}
					</div>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					{!! Form::label('fileName', 'Файл', ['class' => 'mdl-textfield__label']) !!}
					{!! Form::text('fileName[ua]', $ukr->file, ['class'=>'mdl-textfield__input', 'id' => 'fileName', 'disabled']) !!}
				</div>
			@else
				<div class="meta">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_title', 'Meta-title', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_title[ua]', old('meta_title'), ['class'=>'mdl-textfield__input', 'id' => 'meta_title', 'max' => '80']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_keywords', 'Meta-keywords', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_keywords[ua]', old('meta_keywords'), ['class'=>'mdl-textfield__input', 'id' => 'meta_keywords', 'max' => '250']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_description', 'Meta-description', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_description[ua]', old('meta_description'), ['class'=>'mdl-textfield__input', 'id' => 'meta_description', 'max' => '200']) !!}
					</div>
				</div>
				<div class="info">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('title', 'Название', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('title[ua]', old('title'), ['class'=>'mdl-textfield__input', 'id' => 'title']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('description', 'Описание', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('description[ua]', old('description'), ['class'=>'mdl-textfield__input', 'id' => 'description']) !!}
					</div>
				</div>
				<div class="file_block">
					{!! Form::file('file[ua]', ['class' => 'file_uploader']) !!}
				</div>
			@endif
			<div class="lang">
				<input type="hidden" name="lang_id[ua]" value="2">
			</div>
		</div>
	</div>
	<div class="mdl-tabs__panel" id="ru">
		<h3>Русский</h3>
		<div class="ru">
			@if(!is_null($rus))
				<div class="meta">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_title[ru]', 'Meta-title', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_title[ru]', $rus->meta_title, ['class'=>'mdl-textfield__input', 'id' => 'meta_title[ru]', 'max' => '80']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_keywords[ru]', 'Meta-keywords', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_keywords[ru]', $rus->meta_keywords, ['class'=>'mdl-textfield__input', 'id' => 'meta_keywords[ru]', 'max' => '250']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_description[ru]', 'Meta-description', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_description[ru]', $rus->meta_description, ['class'=>'mdl-textfield__input', 'id' => 'meta_description[ru]', 'max' => '200']) !!}
					</div>
				</div>
				<div class="info">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('title[ru]', 'Навзание', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('title[ru]', $rus->title, ['class'=>'mdl-textfield__input', 'id' => 'title[ru]']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('description[ru]', 'Описание', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('description[ru]', $rus->description, ['class'=>'mdl-textfield__input', 'id' => 'description[ru]']) !!}
					</div>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					{!! Form::label('fileName[ru]', 'Файл', ['class' => 'mdl-textfield__label']) !!}
					{!! Form::text('fileName[ru]', $rus->file, ['class'=>'mdl-textfield__input', 'id' => 'fileName[ru]', 'disabled']) !!}
				</div>
			@else
				<div class="meta">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_title[ru]', 'Meta-title', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_title[ru]', old('meta_title'), ['class'=>'mdl-textfield__input', 'id' => 'meta_title[ru]', 'max' => '80']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_keywords[ru]', 'Meta-keywords', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_keywords[ru]', old('meta_keywords'), ['class'=>'mdl-textfield__input', 'id' => 'meta_keywords[ru]', 'max' => '250']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('meta_description[ru]', 'Meta-description', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('meta_description[ru]', old('meta_description'), ['class'=>'mdl-textfield__input', 'id' => 'meta_description[ru]', 'max' => '200']) !!}
					</div>
				</div>
				<div class="info">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('title[ru]', 'Название', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('title[ru]', old('title'), ['class'=>'mdl-textfield__input', 'id' => 'title[ru]']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('description[ru]', 'Описание', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('description[ru]', old('description'), ['class'=>'mdl-textfield__input', 'id' => 'description[ru]']) !!}
					</div>
				</div>
				<div class="file_block">
					{!! Form::file('file[ru]', ['class' => 'file_uploader']) !!}
				</div>
			@endif
			<div class="lang">
				<input type="hidden" name="lang_id[ru]" value="1">
			</div>
		</div>
	</div>
</div>

<div class="add_entity">
	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
		{{$submitButton}}
	</button>
</div>