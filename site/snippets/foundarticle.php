<div class="blog-item">
	<div class="blog-item--header">
		<div class="blog-item--infos">
			<div class="blog-item--date">
				<?= $post->date("d.m.Y") ?>
			</div>
			<div class="blog-item--type">
				<a href="<?= $post->parent()->url() ?>"><?= $post->parent()->title()->html() ?></a>
			</div>
		</div>
		<a class="blog-item--title" href="<?= $post->url() ?>" data-target="post">
			<h2><?= $post->title()->html() ?></h2>
			<?php if($post->subtitle()->isNotEmpty()): ?>
			<h3><?= $post->subtitle()->html() ?></h3>
			<?php endif ?>
		</a>
	</div>
	<?php if ($post->text()->isNotEmpty()): ?>	
		<div class="blog-item--chapeau">
			<?= $post->text()->excerpt(200) ?>
		</div>
	<?php endif ?>
</div>