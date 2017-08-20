<div class="blog-item">
	<div class="item-header">
		<h2 class="blog-item--title">
			<a href="<?= $post->url() ?>"><?= $post->title()->html() ?></a>
		</h2>
		<div class="blog-item--type">
			<a href="<?= $post->parent()->url() ?>"><?= $post->parent()->title()->html() ?></a>
		</div>
		<div class="blog-item--date">
			<?= $post->date("d.m.Y") ?>
		</div>
	</div>
	<div class="item-chapeau">
		<?= $post->text()->kt() ?>
	</div>
</div>