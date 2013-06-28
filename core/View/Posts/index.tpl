<?php foreach ($posts as $post): ?>
	<a href="/posts/view/<?php echo $post['id']; ?>"><?php echo $post['content']; ?></a><br>
<?php endforeach; ?>