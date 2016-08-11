@section('header')
	<div class="container">
		<div class="row">
			<header class="@if(App::getLocale() === 'ru') ru @endif">
				<div class="credentials">
					<div class="logo">
						<a href="{{route('index', ['lang' => App::getLocale()])}}">
							<img src="{{asset('img/markup/logo.png')}}" alt="СмартUp logo">
						</a>
					</div>
					<div class="title">
						<a href="{{route('about_project', ['type' => 'about', 'lang' => App::getLocale()])}}">@lang('navigation.aboutProject')</a>
					</div>
				</div>
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li @if($env === 'index')class="active" @endif>
									<a href="{{route('index', ['lang' => App::getLocale()])}}" id="index">@lang('navigation.index')</a>
								</li>
								<li @if($env === 'articles' || $env === 'article')class="active" @endif id="news">
									<a href="{{route('articles', ['lang' => App::getLocale()])}}">@lang('navigation.news')</a>
								</li>
								<li @if($env === 'opportunity')class="active" @endif>
									<a href="{{route('opportunity_group', ['type' => 'event', 'lang' => App::getLocale()])}}" id="opportunities">@lang('navigation.opportunities')</a>
								</li>
								<li @if($env === 'project')class="active" @endif>
									<a href="{{route('field', ['field' => 1, 'lang' => App::getLocale()])}}" id="projects">@lang('navigation.projects')</a>
								</li>
								<li @if($env === 'about')class="active" @endif>
									<a href="{{route('about', ['type' => 'story', 'lang' => App::getLocale()])}}" id="about">@lang('navigation.about')</a>
								</li>
								<li @if($env === 'contacts')class="active" @endif>
									<a href="{{route('contacts', ['lang' => App::getLocale()])}}" id="contacts">@lang('navigation.contacts')</a>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				<div class="social">
					<div class="vk">
						<a href="https://vk.com/ngosmartzp" target="_blank">
							<i class="fi flaticon-vk"></i>
						</a>
					</div>
					<div class="fb">
						<a href="https://www.facebook.com/ngosmartzp" target="_blank">
							<i class="fi flaticon-facebook-logo"></i>
						</a>
					</div>
					<div class="yb">
						<a href="https://www.youtube.com/channel/UC9UD8HzrDocneLsk-4odXDg" target="_blank">
							<i class="fi flaticon-youtube-logo"></i>
						</a>
					</div>
				</div>
				<div class="langs">
					<a href="ua" class="ua @if(App::getLocale() === 'ua')active @endif">UA</a>
					<a href="ru" class="ru @if(App::getLocale() === 'ru')active @endif">RU</a>
				</div>
			</header>
		</div>
	</div>
@stop