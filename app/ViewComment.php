<section class="comments-view">
	<div id="comment-<?=$id?>" class="comment">
		<?php
			foreach($this->data as $comment){
				echo $comment->name;
			}
		?>
	</div>
</section>

<section class="comment-block">
	<form method="POST">
		<p>Имя:</p> <input type="text" name="log"> </br>
		<p>Комментарий:</p> <input type="text" name="comment"> </br>
	</form>
</section>
