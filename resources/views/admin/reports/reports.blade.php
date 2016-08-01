@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body profiles-body reports-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@forelse($reports as $report)
			@foreach($report->content as $content)
				@include('admin.reports._report_for_list')
			@endforeach
		@empty
			<p>Вы еще не добавляли отчеты.</p>
		@endforelse
		<div class="add_btn" id="add_btn">
			<a href="{{route('create_report')}}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">add</i>
			</a>
		</div>
		<div class="mdl-tooltip mdl-tooltip--top" for="add_btn">
			Добавить отчет
		</div>
	</div>
@stop



