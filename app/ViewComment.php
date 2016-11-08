<section class="comments-view">
<h1>Комментарии</h1>
<?php
foreach ($this->data as $comment) {
?>
	<div <?php if ($this->rowColumnExists($comment, 'id')) {
	?>id="comment-<?=$comment['id']?>" <?php
	} ?>class="comment">
				<p>Автор: <b><?=$this->rowColumnExists($comment, 'name') ? $comment['name'] : ''?></b></p>
				<p><?=$this->rowColumnExists($comment, 'text') ? $comment['text'] : ''?></p>
	</div>
<?php
} ?>
</section>

<section class="comment-block">
	<form method="POST">
		<p>Имя:</p> <input type="text" name="log"> </br>
		<p>Комментарий:</p> <input type="text" name="comment"> </br>
	</form>
</section>
