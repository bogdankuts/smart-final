<div class="general_parameters">
	{{--Type--}}
	{!! Form::select('type', \App\Http\Help::createOptions($types, 'type_id', 'type_title'), 'article', ['class' =>'form-control']) !!}
	{{--Project--}}
	{!! Form::select('project', \App\Http\Help::createOptions($projects, 'project_id', 'title'), null, ['class' =>'form-control']) !!}

	{{--slug--}}
	{{--image--}}
	{{--published--}}





	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? ' has-error' : '' }}">
		{!! Form::label('email', 'E-Mail', ['class' => 'mdl-textfield__label']) !!}
		{!! Form::text('email', old('email'), ['class'=>'mdl-textfield__input', 'id' => 'email']) !!}
	</div>
</div>

















<textarea name="body" id="editor" cols="30" rows="10"></textarea>

<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
<script>
	//CKEDITOR EMBED
	if ($('#editor').length) {
		CKEDITOR.replace('editor', {
			filebrowserBrowseUrl 	   : '../../kcfinder/browse.php?opener=ckeditor&type=files',
			filebrowserImageBrowseUrl  : '../../kcfinder/browse.php?opener=ckeditor&type=images',
			filebrowserFlashBrowseUrl  : '../../kcfinder/browse.php?opener=ckeditor&type=flash',
			filebrowserUploadUrl  	   : '../../kcfinder/upload.php?opener=ckeditor&type=files',
			filebrowserImageUploadUrl  : '../../kcfinder/upload.php?opener=ckeditor&type=images',
			filebrowserFlashUploadUrl  : '../../kcfinder/upload.php?opener=ckeditor&type=flash',
		});
	}
</script>
