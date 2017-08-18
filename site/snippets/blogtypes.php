<div id="blog-categories" class="sections-slider">

<?php foreach ($types as $type): ?>

	<?php $posts = $postsCollection->filterBy('type','==',$type->autoid())->paginate(15) ?>
	<?php if ($posts->count() > 0): ?>
	<section class="blog-section" id="<?= $type->uid() ?>" data-title="<?= $type->title()->escape() ?>">
		<?php 
		$style = "";
		if($type->featured()->isNotEmpty()) $style .= "background-image: url(".$type->featured()->toFile()->thumb('category')->url().");";
		if($type->featuredcolor()->isNotEmpty()) $style .= "background-color: " . $type->featuredcolor() . ";";
		?>
		<?php if($style != ""): ?>
			<div class="blog-category--image" style="<?= $style ?>"></div>
		<?php endif ?>
		<div class="blog-posts">	
			<?php foreach ($posts as $post): ?>
				<?php snippet('article', array('post' => $post, 'typeMode' => true)) ?>
			<?php endforeach ?>
		</div>
	</section>
	<?php endif ?>

	<?php if($posts->pagination()->hasPages()): ?>
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

<?php endforeach ?>

</div>