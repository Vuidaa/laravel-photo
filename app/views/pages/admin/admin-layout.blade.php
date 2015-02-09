<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/jquery.scrolly.min.js"></script>
	<script src="js/lightbox.min.js"></script>
	{{HTML::style('css/lightbox.css')}}
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/admin.css')}}
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
</head>
<body>
<div class='container'>
	<nav class="navbar navbar-default">
		<div class='navbar-collapse collapse'>
			<ul class="nav navbar-nav">
				<li><a href="{{URL::route('home.index.get')}}">Site</a></li>
				<li><a href="{{URL::route('admin.index.get')}}">Dashboard</a></li>
				<li><a href="{{URL::route('admin.create.get')}}">Add new model</a></li>
			</ul>
		</div>
	</nav>
@yield('admin-content')
</div>
</body>
</html>