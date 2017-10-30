<div id="blog-categories" class="sections-slider">

<?php foreach ($categories as $category): ?>

	<?php if ($category->hasVisibleChildren()): ?>
	<section class="blog-section<?php e(isset($lastPost) && $category->is($lastPost), ' last-post') ?>" id="<?= $category->uid() ?>" data-url="<?= $category->url() ?>" data-title="<?= $category->title()->escape() ?>">
		<?php $posts = $category->children()->visible()->sortBy('date', 'desc') ?>
		<?php if($category->featured()->isNotEmpty()): ?>
			<div class="blog-category--image" style="background-image: url(<?= $category->featured()->toFile()->thumb(c::get('thumbs-category'))->url() ?>)">
			</div>
		<?php endif ?>
		<div class="blog-posts">
			<div class="blog-posts--inner">
				<?php if(r::ajax()): ?>
				<?php foreach ($posts as $post): ?>
					<?php snippet('article', array('post' => $post, 'withContent' => false, 'typeMode' => false)) ?>
				<?php endforeach ?>
				<?php if($posts->hasPagination() && $posts->pagination()->hasPages()): ?>
					<!-- pagination -->
					<nav class="pagination">

						<?php if($posts->pagination()->hasNextPage()): ?>
							<a class="next" href="<?= $posts->pagination()->nextPageURL() ?>"><h2>Previous</h2></a>
						<?php endif ?>

						<?php if($posts->pagination()->hasPrevPage()): ?>
							<a class="prev" href="<?= $posts->pagination()->prevPageURL() ?>"><h2>Next</h2></a>
						<?php endif ?>

					</nav>
				<?php endif ?>
				<?php endif ?>
			</div>
		</div>
	</section>
	<?php endif ?>


<?php endforeach ?>

</div>