@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('css')
	{!! Html::style('js/vendor/date-time/css/datepicker.css') !!}
@stop

@section('body')
	<div class="body profile-create-body create-article-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::open(['url' => '/admin/articles', 'method' => 'POST', 'class' => 'admin_create_form', 'files' => 'true']) !!}
			@include('admin.articles._form')
		{!! Form::close() !!}
	</div>
@stop

@section('js')
	{!! Html::script('js/vendor/date-time/js/datepicker.js') !!}
	{!! Html::script('js/vendor/speakingurl.min.js') !!}
	{!! Html::script('js/admin/articles.js') !!}
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
		if ($('#editor-ru').length) {
			CKEDITOR.replace('editor-ru', {
				filebrowserBrowseUrl 	   : '../../kcfinder/browse.php?opener=ckeditor&type=files',
				filebrowserImageBrowseUrl  : '../../kcfinder/browse.php?opener=ckeditor&type=images',
				filebrowserFlashBrowseUrl  : '../../kcfinder/browse.php?opener=ckeditor&type=flash',
				filebrowserUploadUrl  	   : '../../kcfinder/upload.php?opener=ckeditor&type=files',
				filebrowserImageUploadUrl  : '../../kcfinder/upload.php?opener=ckeditor&type=images',
				filebrowserFlashUploadUrl  : '../../kcfinder/upload.php?opener=ckeditor&type=flash',
			});
		}
	</script>
@stop



