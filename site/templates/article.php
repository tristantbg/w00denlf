<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">
	<section class="blog-section">
		<div class="blog-posts">
			<?php snippet('article', array('post' => $page)) ?>
		</div>
	</section>
</div>

<?php snippet('footer') ?>