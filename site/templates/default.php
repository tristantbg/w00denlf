<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">
	<section class="blog-section" data-title="<?= $page->title()->escape() ?>">
		<?php if($page->featured()->isNotEmpty()): ?>
			<div class="blog-category--image" style="background-image: url(<?= $page->featured()->toFile()->thumb(c::get('thumbs-category'))->url() ?>)">
			</div>
		<?php endif ?>
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