<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="icon" type="image/x-icon" href="https://i.ytimg.com/vi/gbD6FGh8IwE/maxresdefault.jpg">
	<!-- <link rel="stylesheet" type="text/css" href="css/bgLoader.css"> -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
	<script src="js/jquery-3.6.3.min.js"></script>
</head>
<body>
	<!-- This is an example component -->
	@include('admin.partials.navbar')
	@include('admin.partials.sidebar')
	<!-- main content -->	
	@yield('content')


	<!-- <script src="js/bgLoader.js"></script> -->
	<script src="js/sendData.js"></script>
	<script src="js/innerHTML.js"></script>
	<script src="{{ asset('js/fontAwesome.js') }}"></script>
</body>
</html>