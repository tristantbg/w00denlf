<div id="blog-categories" class="sections-slider">

<?php foreach ($categories as $category): ?>

	<?php if ($category->hasVisibleChildren()): ?>
	<section class="blog-section" id="<?= $category->uid() ?>" data-title="<?= $category->title()->escape() ?>">
		<?php $posts = $category->children()->visible()->sortBy('date', 'desc')->paginate(15) ?>
		<?php if($category->featured()->isNotEmpty()): ?>
			<div class="blog-category--image" style="background-image: url(<?= $category->featured()->toFile()->thumb('category')->url() ?>)">
			</div>
		<?php endif ?>
		<div class="blog-posts">	
			<?php foreach ($posts as $post): ?>
				<?php snippet('article', array('post' => $post, 'typeMode' => false)) ?>
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