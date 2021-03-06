<div id="blog-categories" class="sections-slider">

<?php foreach ($types as $type): ?>

	<?php $posts = $postsCollection->filterBy('type','==',$type->autoid()) ?>
	<?php if ($posts->count() > 0): ?>
	<section class="blog-section<?php e(isset($lastPost) && $type->is($lastPost), ' last-post') ?>" id="<?= $type->uid() ?>" data-url="<?= $type->url() ?>" data-title="<?= $type->title()->escape() ?>">
		<?php 
		$style = "";
		if($type->featured()->isNotEmpty()) $style .= "background-image: url(".$type->featured()->toFile()->thumb(c::get('thumbs-category'))->url().");";
		// if($type->featuredcolor()->isNotEmpty()) $style .= "background-color: " . $type->featuredcolor() . ";";
		?>
		<?php if($style != ""): ?>
			<div class="blog-category--image invert" style="<?= $style ?>"></div>
		<?php endif ?>
		<div class="blog-posts">
			<div class="blog-posts--inner">
				<?php if(r::ajax()): ?>
				<?php foreach ($posts as $post): ?>
					<?php snippet('article', array('post' => $post, 'withContent' => false, 'typeMode' => true)) ?>
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