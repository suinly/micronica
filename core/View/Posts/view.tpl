<div class="post post-center">
	<?php if ($post['content'] != ''): ?>
		<div class="text"><?php echo $post['content']; ?></div>
	<?php endif; ?>

	<?php if (count($attachments) > 0): ?>
		<div class="attachments">
		<?php foreach ($attachments as $attach): ?>
			<a href="/uploads/images/<?php echo $attach['content']; ?>" rel="post<?php echo $post['id']; ?>" class="fancybox">
				<img src="/uploads/images/<?php echo $attach['content']; ?>">
			</a>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<script type="text/javascript">
	$(function() {
		$('.fancybox').fancybox();
	});
</script>