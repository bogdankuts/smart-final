@section('drawer')
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Привет, {{Auth::user()->name}}</span>
        <nav class="mdl-navigation">

            <a class="mdl-navigation__link @if ( $env === 'dashboard') active_nav @endif" href="{{route('dashboard')}}">Панель управления</a>
            <div class="mdl-navigation__devider"></div>

            <a class="mdl-navigation__link @if ( $env === 'articles') active_nav @endif" href="{{route('admin_articles')}}">Новости</a>
            <a class="mdl-navigation__link @if ( $env == 'article' || $env == 'create_article' || $env === 'update_article') active_nav @endif" href="{{route('create_article')}}">Добавить новость</a>
            <div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'profiles') active_nav @endif" href="{{route('admin_profiles')}}">Профайлы</a>
			<a class="mdl-navigation__link @if ( $env === 'profile' || $env == 'create_profile' || $env == 'update_profile') active_nav @endif" href="{{route('create_profile')}}">Добавить профайл</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'positions') active_nav @endif" href="{{route('admin_positions')}}">Вакансии</a>
			<a class="mdl-navigation__link @if ( $env === 'position' || $env == 'create_position' || $env == 'update_position') active_nav @endif" href="{{route('create_position')}}">Добавить вакансию</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'projects') active_nav @endif" href="{{route('admin_projects')}}">Проекты</a>
			<a class="mdl-navigation__link @if ( $env === 'project' || $env == 'create_project' || $env == 'update_project') active_nav @endif" href="{{route('create_project')}}">Добавить проект</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'categories') active_nav @endif" href="{{route('admin_categories')}}">Категории вакансий/резюме</a>
			<a class="mdl-navigation__link @if ( $env === 'category' || $env == 'create_category' || $env == 'update_category') active_nav @endif" href="{{route('create_category')}}">Добавить категорию</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'reports') active_nav @endif" href="{{route('admin_reports')}}">Отчеты</a>
			<a class="mdl-navigation__link @if ( $env === 'report' || $env == 'create_report' || $env == 'update_report') active_nav @endif" href="{{route('create_report')}}">Добавить отчет</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'subscribers') active_nav @endif" href="{{route('admin_subscribers')}}">Подписчики</a>
			<div class="mdl-navigation__devider"></div>

            <a class="mdl-navigation__link @if ( $env === 'admins') active_nav @endif" href="{{route('admins')}}">Администраторы</a>
            <a class="mdl-navigation__link @if ( $env === 'admin' || $env == 'admin_create' || $env == 'admin_update') active_nav @endif" href="{{route('create_admin')}}">Добавить администратора</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link" href="{{route('admin_about')}}"><i class="material-icons">help_outline</i></a>
		</nav>
    </div>
@stop