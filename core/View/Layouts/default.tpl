<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo Config::get('BLOG_TITLE'); ?></title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/micronica.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="/js/masonry.min.js"></script>
	<script type="text/javascript" src="/js/imagesloaded.min.js"></script>
</head>

<body>

	<div id="container">
		<header>
			<h1><?php echo Config::get('BLOG_TITLE'); ?></h1>
			<p>
				<?php if (isset($_SESSION['User'])): ?>
					<?php echo $_SESSION['User']['username']; ?> / 
					<a href="/users/logout">Выйти</a>
				<?php endif; ?>
			</p>
		</header>
		<div class="content">
			<?php echo $this->content(); ?>
		</div>
		
		<footer>
			<p>Copyright 2013 Micronica</p>
		</footer>
	</div>
</body>

</html>