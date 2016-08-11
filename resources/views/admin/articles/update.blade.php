@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('css')
	{!! Html::style('js/vendor/date-time/css/datepicker.css') !!}
@stop

@section('body')
	<div class="body profile-create-body create-article-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		{!! Form::model($article, ['url' => "/admin/articles/$article->slug", 'method' => 'put', 'class' => 'create_form', 'files' => 'true']) !!}
		@include('admin.articles._update_form')
		{!! Form::close() !!}
		{!! Form::open(['url' => "/admin/articles/$article->slug", 'method' => 'DELETE', 'class' => 'delete_entity_form']) !!}
			{!! Form::submit('Удалить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
		{!! Form::close() !!}
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_article')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить новость
		</div>
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



