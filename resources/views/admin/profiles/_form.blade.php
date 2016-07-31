<div class="general_info">
	<h2>Общая инфрмация</h2>
	<div class="one_select mdl-cell mdl-cell--6-col">
		{!! Form::label('category_id', 'Выберете категорию', ['class' => 'non_material_label']) !!}
		{!! Form::select('category_id', \App\Http\Help::createOptions($categories, 'category_id', 'title_ua'), null, ['class' =>'form-control select']) !!}
	</div>
	<div class="one_select mdl-cell mdl-cell--6-col">
		{!! Form::label('published_at', 'Дата публикации', ['class' => 'non_material_label']) !!}
		{!! Form::text('published_at', \Carbon\Carbon::now()->format('d.m.Y H:i'), ['id' => 'published_at', 'class' => 'form-control datepicker-here select', 'data-timepicker' => 'true']) !!}
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
					{!! Form::label('name', 'Имя', ['class' => 'mdl-textfield__label']) !!}
					{!! Form::text('name[ua]', old('name'), ['class'=>'mdl-textfield__input', 'id' => 'name']) !!}
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					{!! Form::label('description', 'Описание', ['class' => 'mdl-textfield__label']) !!}
					{!! Form::text('description[ua]', old('description'), ['class'=>'mdl-textfield__input', 'id' => 'description']) !!}
				</div>
			</div>
			<div class="file_block">
				{!! Form::file('file[ua]', ['class' => 'file_uploader']) !!}
			</div>
			<div class="lang">
				<input type="hidden" name="lang_id[ua]" value="2">
			</div>
		</div>
	</div>
	<div class="mdl-tabs__panel" id="ru">
		<h3>Русский</h3>
		<div class="ru">
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
					{!! Form::label('name[ru]', 'Имя', ['class' => 'mdl-textfield__label']) !!}
					{!! Form::text('name[ru]', old('name'), ['class'=>'mdl-textfield__input', 'id' => 'name[ru]']) !!}
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					{!! Form::label('description[ru]', 'Описание', ['class' => 'mdl-textfield__label']) !!}
					{!! Form::text('description[ru]', old('description'), ['class'=>'mdl-textfield__input', 'id' => 'description[ru]']) !!}
				</div>
			</div>
			<div class="file_block">
				{!! Form::file('file[ru]', ['class' => 'file_uploader']) !!}
			</div>
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