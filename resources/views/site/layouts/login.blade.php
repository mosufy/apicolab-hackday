<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{ URL::to('/') }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Manage and showcase property listings on your own website using a simple and easy-to-use web platform from just $29/mth!">
	<meta name="author" content="Mosufy">

	<title>{{ $pageTitle or 'PropertyAPI - Singapore Property Listing Management Software' }}</title>

	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="favicon.ico" rel="icon" type="image/ico">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	@yield('head')

</head>
<body>
	<div id="wrapper">

		@yield('content')

	</div>
	<!-- /#wrapper -->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	@yield('footer')

	<script src="js/retina.min.js"></script> 
</body>
</html>