<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">
	<section class="blog-section" data-title="<?= $page->title()->escape() ?>">
		<div class="blog-posts">
			<div class="blog-posts--inner">
				<?= $page->text()->kt() ?>
			</div>
		</div>
	</section>
</div>

<?php snippet('footer') ?>