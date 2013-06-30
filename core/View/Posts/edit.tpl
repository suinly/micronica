<div class="row-fluid">
	<div class="span4"></div>
	<div class="span4">
		<form action="/posts/edit/<?php echo $post['id']; ?>" method="POST" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label" for="postContent">Новый пост</label>
				<div class="controls">
					<textarea class="span12" rows="3" name="content" id="postContent" required="required"><?php echo $post['content']; ?></textarea>
				</div>
			</div>
			<span id="ajaxForms"></span>
		    <div style="text-align: right">
		    	<div class="btn-group">
				  <button class="btn btn-mini btn-link dropdown-toggle" data-toggle="dropdown" type="button">
				  	Добавить файл
				  </button>
				  <ul class="dropdown-menu dropdown-menu-arrow pull-right" style="text-align: left;">
				    <li><a href="#" data-form="image">Изображение</a></li>
				    <li><a href="#" data-form="music">Музыка</a></li>
				    <li><a href="#" data-form="quote">Цитата</a></li>
				  </ul>
				</div>
			  	<button type="submit" class="btn btn-mini btn-link btn-info">Отправить</button>
			</div>
		</form>
		<label>Предосмотр</label>
		<hr style="margin: 0px;">
		<span id="preview">
			<span class="text"></span>
			<span class="image"></span>
		</span>
	</div>
	<div class="span4"></div>
</div>

<script type="text/javascript">
	$(function() {
		$('.dropdown-menu li a').click(function() {
			var self = $(this);
			
			$.get('/posts/form/' + self.data('form'), function(data) {
				$('.btn-group').removeClass('open');
				$('#ajaxForms').append(data);
			});

			return false;
		});

		$('#postContent').bind('change click keyup', function() {
			$('#preview .text').html($(this).val());
		});
	});
</script>