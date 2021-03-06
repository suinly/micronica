<div class="row-fluid">
	<div class="span4"></div>
	<div class="span4">
		<form action="/posts/add" method="POST" enctype="multipart/form-data" id="postAddForm">
			<div class="control-group">
				<label class="control-label" for="postContent">Новый пост</label>
				<div class="controls">
					<textarea class="span12" rows="3" name="content" id="postContent" value=""></textarea>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input type="file" name="images[]" multiple="multiple" id="postImages">
				</div>
			</div>
			
			<span id="ajaxForms"></span>
		    <div style="text-align: right">
		    <!--	<div class="btn-group">
				  <button class="btn btn-mini btn-link dropdown-toggle" data-toggle="dropdown" type="button">
				  	Добавить файл
				  </button>
				  <ul class="dropdown-menu dropdown-menu-arrow pull-right" style="text-align: left;">
				    <li><a href="#" data-form="image">Изображение</a></li>
				    <li><a href="#" data-form="music">Музыка</a></li>
				    <li><a href="#" data-form="quote">Цитата</a></li>
				  </ul>
				</div>
			-->
			  	<button type="submit" class="btn btn-mini btn-link btn-info">Отправить</button>
			</div>
		</form>
		<label>Предосмотр</label>
		<hr style="margin: 0px;">
		<div id="preview">
			<div class="text"></div>
			<div class="attachments"></div>
		</div>
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

		$('#postImages').bind('change', function() {
			readURL(this);
		});
	});


	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	        	$('#preview .text').append(e);
	        	$('#preview .attachments').append('<img src="">');
	            $('#preview .attachments img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>