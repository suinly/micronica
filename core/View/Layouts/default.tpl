<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo Config::get('BLOG_TITLE'); ?></title>
	<link rel="stylesheet" type="text/css" href="/css/micronica.css">
</head>

<body>

	<header>
		<h1><?php echo Config::get('BLOG_TITLE'); ?></h1>
		<p>
			<?php if (isset($_SESSION['User'])): ?>
				<?php echo $_SESSION['User']['username']; ?> / 
				<a href="/users/logout">Выйти</a>
			<?php endif; ?>
		</p>
	</header>
	
	<section>
	
		<?php echo $this->content(); ?>
		
	</section>
	
	<footer>
		<p>Copyright 2009 Your name</p>
	</footer>

</body>

</html>