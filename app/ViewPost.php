<section class="post-list">
<?php
		foreach($this->data as $post) {
?>
<article id="post-<?=$post['id']?>" class="post">
<?php
			if ($this->rowColumnExists($post, 'title')) {
				?><a href="/post/<?=$post['id']?>"><h1 class="post-title"><?=$post['title'], "\n"; ?></h1></a><?php
			}
			if ($this->rowColumnExists($post, 'date')) {
				?>
<span class="post-date">Опубликовано <?=$post['date']?></span><?php
			}
			if ($this->rowColumnExists($post, 'text')) {
				?>

<p class="post-text"><?=$post['text']?></p><?php
			}
?>

</article>

<?php
		}
?>
</section>
