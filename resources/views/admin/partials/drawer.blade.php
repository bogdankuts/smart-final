@section('drawer')
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Привет, {{Auth::user()->name}}</span>
        <nav class="mdl-navigation">

            <a class="mdl-navigation__link @if ( $env == 'dashboard') active_nav @endif" href="{{route('dashboard')}}">Панель управления</a>
            <div class="mdl-navigation__devider"></div>

            <a class="mdl-navigation__link @if ( $env == 'articles' || $env == 'article') active_nav @endif" href="{{route('admin_articles')}}">Новости</a>
            <a class="mdl-navigation__link @if ( $env == 'change_article') active_nav @endif" href="{{route('create_article')}}">Добавить новость</a>
            <div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'projects') active_nav @endif" href="{{route('admin_projects')}}">Проекты</a>
			<a class="mdl-navigation__link @if ( $env === 'project' || $env == 'create_project' || $env == 'update_project') active_nav @endif" href="{{route('create_project')}}">Добавить проект</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link @if ( $env === 'categories') active_nav @endif" href="{{route('admin_categories')}}">Категории вакансий/резюме</a>
			<a class="mdl-navigation__link @if ( $env === 'category' || $env == 'create_category' || $env == 'update_category') active_nav @endif" href="{{route('create_category')}}">Добавить категорию</a>
			<div class="mdl-navigation__devider"></div>

            <a class="mdl-navigation__link @if ( $env === 'admins') active_nav @endif" href="{{route('admins')}}">Администраторы</a>
            <a class="mdl-navigation__link @if ( $env === 'admin' || $env == 'admin_create' || $env == 'admin_update') active_nav @endif" href="{{route('create_admin')}}">Добавить администратора</a>
			<div class="mdl-navigation__devider"></div>

			<a class="mdl-navigation__link" href="{{route('admin_about')}}"><i class="material-icons">help_outline</i></a>
		</nav>
    </div>
@stop