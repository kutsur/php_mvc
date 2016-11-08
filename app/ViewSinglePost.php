<section class="post-list">
	<article id="post-<?=$id?>" class="post">
	<?php
				if (isset($title)) {
					?><h1 class="post-title"><?=$title?></h1><?php
				}
				if (isset($date)) {
					?>
	<span class="post-date">Опубликовано <?=$date?></span><?php
				}
				if (isset($text)) {
					?>

	<p class="post-text"><?=$text?></p><?php
				}
	?>

	</article>

</section>
<?php $this->renderChilds('bottom'); ?>
