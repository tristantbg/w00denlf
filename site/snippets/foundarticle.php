<div class="blog-item">
	<div class="blog-item--header">
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
	<div class="blog-item--chapeau">
		<?= $post->text()->excerpt(200) ?>
	</div>
</div>