<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('img/markup/favicon.ico') }}">

	@yield('meta')

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

	{!!Html::style('css/style.css') !!}
{{--	{!!HTML::style('css/flaticon.css') !!}--}}

	@yield('css')
</head>
<body class="front">
@yield('header')
@yield('body')
@yield('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{!!Html::script('js/navbar.js') !!}
{!!Html::script('js/ajax.js') !!}
<script>
	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@yield('js')
</body>
</html>
