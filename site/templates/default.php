<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">
	<section class="blog-section" data-title="<?= $page->title()->escape() ?>">
		<div class="blog-posts">
			<div class="blog-posts--inner">
				<section class="post-content content--text">
					<?= $page->text()->kt() ?>
				</section>
			</div>
		</div>
	</section>
</div>

<?php snippet('footer') ?>