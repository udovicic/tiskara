<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?= SITE_URL ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/style.css">

	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script>window.html5 || document.write('<script src="<?= SITE_URL ?>/js/html5shiv.js"><\/script>')</script>
	<![endif]-->
	<script src="<?= SITE_URL ?>/js/jquery-1.10.1.min.js"></script>
	<script src="<?= SITE_URL ?>/js/bootstrap.min.js"></script>
	<script src="<?= SITE_URL ?>/js/main.js"></script>
	
	<title><?= $title ?></title>
</head>
<body>
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	
	<!-- fixed navbar -->
	<header class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?= SITE_URL ?>" class="navbar-brand" id="logo">Tiskara <span class="glyphicon glyphicon-print"></span></a>
			</div> <!-- end .navbar.navbar-default -->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?= SITE_URL . '/publications/listing' ?>">Izdanja</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Izvještaj <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?= SITE_URL . '/materials/publications/' ?>">Pregled tiskanih izdanja</a></li>
							<li><a href="<?= SITE_URL . '/materials/printable/weekly' ?>">Tjedna potrošnja</a></li>
							<li><a href="<?= SITE_URL . '/materials/printable/period' ?>">Potrošnja za period</a></li>
						</ul>
					</li>
				</ul>
			</div> <!-- end .navbar-collapse.collapse -->
		</div><!-- end .container -->
	</header>

	<!-- main content -->
	<div class="container">
