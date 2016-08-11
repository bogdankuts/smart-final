@extends('admin/layout')
@extends('admin/partials/header')
@extends('admin/partials/drawer')

@section('body')
	<div class="body dashboard mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		@if($notifications['newAdmins'] > 0
        || $notifications['newArticles'] > 0
        || $notifications['newProfiles'] > 0
        || $notifications['newPositions'] > 0
        || $notifications['newDocuments'] > 0
        || $notifications['newSubscribers'] > 0
        )
			<div class="notifications mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
				<h4 class="mdl-typography--display-1 main_heading">Со времени вашего последнего входа произошло следующее</h4>
				@if($notifications['newAdmins'] > 0)
					<div class="one_notification" id="newAdmins">
						<div class= "content">
							<div class="badge-block">
								<div class="mdl-badge" data-badge="{{$notifications['newAdmins']}}" id="new_admins">
									<i class="material-icons notification_icon">person_add</i>
								</div>
							</div>
							<div class="mdl-card__actions">
								<a href="/admin/recent/admins/{{$lastVisit}}" target="_blank" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Подробнее
								</a>
							</div>
							<div class="mdl-card__menu">
								<button class="mdl-button mdl-js-button mdl-button--icon close_notification-admins">
									<i class="material-icons">close</i>
								</button>
							</div>
							<div class="mdl-tooltip" for="new_admins">
								Новые админы
							</div>
						</div>
					</div>
				@endif
				@if($notifications['newArticles'] > 0)
					<div class="one_notification" id="newArticles">
						<div class= "content">
							<div class="badge-block">
								<div class="mdl-badge" data-badge="{{$notifications['newArticles']}}" id="new_articles">
									<i class="material-icons notification_icon">book</i>
								</div>
							</div>
							<div class="mdl-card__actions">
								<a href="/admin/recent/articles/{{$lastVisit}}" target="_blank" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Подробнее
								</a>
							</div>
							<div class="mdl-card__menu">
								<button class="mdl-button mdl-js-button mdl-button--icon close_notification-articles">
									<i class="material-icons">close</i>
								</button>
							</div>
							<div class="mdl-tooltip" for="new_articles">
								Новые статьи
							</div>
						</div>
					</div>
				@endif
				@if($notifications['newProfiles'] > 0)
					<div class="one_notification" id="newProfiles">
						<div class= "content">
							<div class="badge-block">
								<div class="mdl-badge" data-badge="{{$notifications['newProfiles']}}" id="new_profiles">
									<i class="material-icons notification_icon">assignment</i>
								</div>
							</div>
							<div class="mdl-card__actions">
								<a href="/admin/recent/profiles/{{$lastVisit}}" target="_blank" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Подробнее
								</a>
							</div>
							<div class="mdl-card__menu">
								<button class="mdl-button mdl-js-button mdl-button--icon close_notification-profiles">
									<i class="material-icons">close</i>
								</button>
							</div>
							<div class="mdl-tooltip" for="new_profiles">
								Новые профайлы
							</div>
						</div>
					</div>
				@endif
				@if($notifications['newPositions'] > 0)
					<div class="one_notification" id="newPositions">
						<div class= "content">
							<div class="badge-block">
								<div class="mdl-badge" data-badge="{{$notifications['newPositions']}}" id="new_positions">
									<i class="material-icons notification_icon">note_add</i>
								</div>
							</div>
							<div class="mdl-card__actions">
								<a href="/admin/recent/positions/{{$lastVisit}}" target="_blank" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Подробнее
								</a>
							</div>
							<div class="mdl-card__menu">
								<button class="mdl-button mdl-js-button mdl-button--icon close_notification-positions">
									<i class="material-icons">close</i>
								</button>
							</div>
							<div class="mdl-tooltip" for="new_positions">
								Новые вакансии
							</div>
						</div>
					</div>
				@endif
				@if($notifications['newDocuments'] > 0)
					<div class="one_notification" id="newDocuments">
						<div class= "content">
							<div class="badge-block">
								<div class="mdl-badge" data-badge="{{$notifications['newDocuments']}}" id="new_documents">
									<i class="material-icons notification_icon">dns</i>
								</div>
							</div>
							<div class="mdl-card__actions">
								<a href="/admin/recent/documents/{{$lastVisit}}" target="_blank" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Подробнее
								</a>
							</div>
							<div class="mdl-card__menu">
								<button class="mdl-button mdl-js-button mdl-button--icon close_notification-documents">
									<i class="material-icons">close</i>
								</button>
							</div>
							<div class="mdl-tooltip" for="new_documents">
								Новые документы
							</div>
						</div>
					</div>
				@endif
				@if($notifications['newSubscribers'] > 0)
					<div class="one_notification" id="newSubscribers">
						<div class= "content">
							<div class="badge-block">
								<div class="mdl-badge" data-badge="{{$notifications['newSubscribers']}}" id="new_subscribers">
									<i class="material-icons notification_icon">accessibility</i>
								</div>
							</div>
							<div class="mdl-card__actions">
								<a href="/admin/recent/subscribers/{{$lastVisit}}" target="_blank" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Подробнее
								</a>
							</div>
							<div class="mdl-card__menu">
								<button class="mdl-button mdl-js-button mdl-button--icon close_notification-subscribers">
									<i class="material-icons">close</i>
								</button>
							</div>
							<div class="mdl-tooltip" for="new_subscribers">
								Новые подписчики
							</div>
						</div>
					</div>
				@endif
			</div>
		@endif

		<div class="popular_block  mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<h3 class="block_heading">Самые популярные статьи</h3>
			@forelse($popularArticles as $article)
				@foreach($article->content as $content)
					@include('admin.articles._article_for_list')
				@endforeach
			@empty
				<p>Вы еще не добавляли статьи.</p>
			@endforelse
		</div>

		<div class="popular_block  mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<h3 class="block_heading">Самые популярные вакансии</h3>
			@forelse($popularPositions as $position)
				@foreach($position->content as $content)
					@include('admin.positions._position_for_list')
				@endforeach
			@empty
				<p>Вы еще не добавляли вакансий.</p>
			@endforelse
		</div>

		<div class="popular_block  mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<h3 class="block_heading">Самые популярные профайлы</h3>
			@forelse($popularProfiles as $profile)
				@foreach($profile->content as $content)
					@include('admin.profiles._profile_for_list')
				@endforeach
			@empty
				<p>Вы еще не добавляли профайлы.</p>
			@endforelse
		</div>

		<div class="recent_block mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
			<h3 class="block_heading">Последние статьи</h3>
			@forelse($recentArticles as $article)
				@foreach($article->content as $content)
					@include('admin.articles._article_for_list')
				@endforeach
			@empty
				<p>Вы еще не добавляли статьи.</p>
			@endforelse
		</div>
		<div class="recent_block recent_block--docs mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
			<h3 class="block_heading">Последние документы</h3>
			@forelse($recentReports as $report)
				@foreach($report->content as $content)
					@include('admin.reports._report_for_list')
				@endforeach
			@empty
				<p>Вы еще не добавляли отчеты.</p>
			@endforelse
		</div>
		<div class="recent_block recent_block--subscribers subscribers-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
			<h3 class="block_heading">Последние подписчики</h3>
			@forelse($recentSubscribers as $subscriber)
				@include('admin.subscribers._subscribers_for_list')
			@empty
				<p>Подписчиков еще нет.</p>
			@endforelse
		</div>
			<div class="recent_block recent_block--positions subscribers-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
				<h3 class="block_heading">Последние вакансии</h3>
				@forelse($recentPositions as $position)
					@foreach($position->content as $content)
						@include('admin.positions._position_for_list')
					@endforeach
				@empty
					<p>Вы еще не добавляли вакансий.</p>
				@endforelse
			</div>
			<div class="recent_block recent_block--profiles subscribers-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--6-col">
				<h3 class="block_heading">Последние профайлы</h3>
				@forelse($recentProfiles as $profile)
					@foreach($profile->content as $content)
						@include('admin.profiles._profile_for_list')
					@endforeach
				@empty
					<p>Вы еще не добавляли профайлы.</p>
				@endforelse
			</div>
	</div>
@stop



