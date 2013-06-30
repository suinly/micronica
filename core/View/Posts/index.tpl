<div class="posts">
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<?php if ($post['content'] != ''): ?>
				<div class="text"><?php echo $post['content']; ?></div>
			<?php endif; ?>

			<?php if (count($post['attachments']) > 0): ?>
				<div class="attachments">
				<?php foreach ($post['attachments'] as $attach): ?>
					<a href="/uploads/images/<?php echo $attach['content']; ?>" rel="post<?php echo $post['id']; ?>" class="fancybox">
						<img src="/uploads/images/<?php echo $attach['content']; ?>">
					</a>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
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

		$('.fancybox').fancybox();
	});
</script>