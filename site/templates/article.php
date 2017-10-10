<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">
	<section class="blog-section">
		<?php if($page->parent()->featured()->isNotEmpty()): ?>
			<div class="blog-category--image" style="background-image: url(<?= $page->parent()->featured()->toFile()->thumb(c::get('thumbs-category'))->url() ?>)">
			</div>
		<?php endif ?>
		<div class="blog-posts">
			<?php snippet('article', array('post' => $page, 'withContent' => true)) ?>
		</div>
	</section>
</div>

<?php snippet('footer') ?>