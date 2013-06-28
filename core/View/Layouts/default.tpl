<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo Config::get('BLOG_TITLE'); ?></title>
</head>

<body>

	<header>
		<nav>
			<ul>
				<li>Your menu</li>
			</ul>
		</nav>
	</header>
	
	<section>
	
		<?php echo $this->content(); ?>
		
	</section>
	
	<footer>
		<p>Copyright 2009 Your name</p>
	</footer>

</body>

</html>