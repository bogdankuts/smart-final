<div class="general_parameters">
	<h2>Общая информация</h2>
	<div class="one_select mdl-cell mdl-cell--6-col">
		{!! Form::label('type_id', 'Выберете категорию', ['class' => 'non_material_label']) !!}
		{!! Form::select('type_id', \App\Http\Help::createOptions($types, 'type_id', 'type_title'), $article->type_id, ['class' =>'form-control', 'id' => 'type_select']) !!}
	</div>
	<div class="one_select mdl-cell mdl-cell--6-col js_project_input project_input">
		{!! Form::label('project_id', 'Выберете проект', ['class' => 'non_material_label']) !!}
		{!! Form::select('project_id', \App\Http\Help::createOptions($projects, 'project_id', 'title_ua'), $article->project_id, ['class' =>'form-control js_input', 'disabled']) !!}
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label slug_block {{ $errors->has('slug') ? 'is-invalid' : '' }}">
		{!! Form::label('slug', 'Ссылка', ['class' => 'mdl-textfield__label']) !!}
		{!! Form::text('slug', old('slug'), ['class'=>'mdl-textfield__input', 'id' => 'slug', 'max' => '80']) !!}
		@if ($errors->has('slug'))
			<span class="help-block">
				<strong>{{ $errors->first('slug') }}</strong>
			</span>
		@endif
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label date {{ $errors->has('published_at') ? 'is-invalid' : '' }}">
		{!! Form::label('published_at', 'Дата публикации', ['class' => 'mdl-textfield__label']) !!}
		{!! Form::text('published_at', $article->published_at->format('d.m.Y H:i'), ['id' => 'published_at', 'class' => 'mdl-textfield__input datepicker-here select', 'data-timepicker' => 'true']) !!}
		@if ($errors->has('published_at'))
			<span class="help-block">
				<strong>{{ $errors->first('published_at') }}</strong>
			</span>
		@endif
	</div>
	<div class="file_block">
		{!! Form::label('image', 'Выбирете новую миниатюру статьи', ['class' => 'file_uploader--label']) !!}
		{!! Form::file('image', ['class' => 'file_uploader']) !!}
		@if ($errors->has('image'))
			<span class="help-block">
				<strong>{{ $errors->first('image') }}</strong>
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
						{!! Form::text('meta_description[ua]', $ukr->meta_description, ['class'=>'mdl-textfield__input', 'id' => 'meta_description', 'max' => '200']) !!}
					</div>
				</div>
				<div class="info">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('title', 'Название', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('title[ua]', $ukr->title, ['class'=>'mdl-textfield__input', 'id' => 'title']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('preview_text', 'Превью', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('preview_text[ua]', $ukr->preview_text, ['class'=>'mdl-textfield__input', 'id' => 'preview_text', 'max' => '128']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::textarea('body[ua]', $ukr->body, ['cols' => '30', 'rows' => '10', 'id' => 'editor']) !!}
					</div>
				</div>
				<div class="lang">
					<input type="hidden" name="lang_id[ua]" value="2">
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
						{!! Form::label('preview_text', 'Превью', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('preview_text[ua]', old('preview_text'), ['class'=>'mdl-textfield__input', 'id' => 'preview_text', 'max' => '128']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::textarea('body[ua]', null, ['cols' => '30', 'rows' => '10', 'id' => 'editor']) !!}
					</div>
				</div>
				<div class="lang">
					<input type="hidden" name="lang_id[ua]" value="2">
				</div>
			@endif
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
						{!! Form::label('title[ru]', 'Название', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('title[ru]', $rus->title, ['class'=>'mdl-textfield__input', 'id' => 'title[ru]']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::label('preview_text', 'Превью', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('preview_text[ru]', $rus->preview_text, ['class'=>'mdl-textfield__input', 'id' => 'preview_text', 'max' => '128']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::textarea('body[ru]', $rus->body, ['cols' => '30', 'rows' => '10', 'id' => 'editor-ru']) !!}
					</div>
				</div>
				<div class="lang">
					<input type="hidden" name="lang_id[ru]" value="1">
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
						{!! Form::label('preview_text', 'Превью', ['class' => 'mdl-textfield__label']) !!}
						{!! Form::text('preview_text[ru]', old('preview_text'), ['class'=>'mdl-textfield__input', 'id' => 'preview_text', 'max' => '128']) !!}
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						{!! Form::textarea('body[ru]', null, ['cols' => '30', 'rows' => '10', 'id' => 'editor-ru']) !!}
					</div>
				</div>
				<div class="lang">
					<input type="hidden" name="lang_id[ru]" value="1">
				</div>
			@endif
		</div>
	</div>
</div>
<div class="add_entity">
	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
		{{$submitButton}}
	</button>
</div>
