<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">
	<section class="blog-section" data-title="<?= $page->title()->escape() ?>">
		<div class="blog-posts">
			<div class="blog-posts--inner">
				<div id="search-header">
					<?= $posts->count() ?> résultats pour “<?= $query ?>”
				</div>
				<?php foreach($posts as $post): ?>
					<?php snippet('foundarticle', array('post' => $post)) ?>
				<?php endforeach ?>
				<?php if($posts->hasPagination() && $posts->pagination()->hasPages()): ?>
					<!-- pagination -->
					<nav id="pagination">

						<?php if($posts->pagination()->hasNextPage()): ?>
							<a class="next" href="<?php echo $projects->pagination()->nextPageURL() ?>"><h2>Previous</h2></a>
						<?php endif ?>

						<?php if($posts->pagination()->hasPrevPage()): ?>
							<a class="prev" href="<?php echo $projects->pagination()->prevPageURL() ?>"><h2>Next</h2></a>
						<?php endif ?>

					</nav>
				<?php endif ?>
			</div>
		</div>
	</section>
</div>

<?php snippet('footer') ?>