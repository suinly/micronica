<div class="posts">
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<?php echo $post['content']; ?>
		</div>
	<?php endforeach; ?>
</div>

<script type="text/javascript">
	$(function() {
		var $container = $('.posts').masonry();
		// layout Masonry again after all images have loaded
		$container.imagesLoaded( function() {
		  $container.masonry({
			  itemSelector: '.post',
			  transitionDuration: 0
			});
		});
	});
</script>