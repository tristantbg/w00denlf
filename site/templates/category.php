<?php snippet('header') ?>

<?php 

function _bot_detected() {
  if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}
$bot = _bot_detected();
?>

<?php if(!$bot && !r::ajax()): ?>
<script>
	window.location = window.location.href.replace("blog/", "/#");
</script>
<?php endif ?>

<div id="blog-categories" class="sections-slider">

<?php if ($page->hasVisibleChildren()): ?>
<section class="blog-section" id="<?= $page->uid() ?>" data-title="<?= $page->title()->escape() ?>">
	<?php $posts = $page->children()->visible()->sortBy('date', 'desc')->paginate(1) ?>
	<?php if($page->featured()->isNotEmpty()): ?>
		<div class="blog-category--image" style="background-image: url(<?= $page->featured()->toFile()->thumb(c::get('thumbs-category'))->url() ?>)">
		</div>
	<?php endif ?>
	<div class="blog-posts">
		<div class="blog-posts--inner">
			<?php foreach ($posts as $post): ?>
				<?php snippet('article', array('post' => $post, 'typeMode' => false)) ?>
			<?php endforeach ?>
			<?php if($posts->pagination()->hasPages()): ?>
				<!-- pagination -->
				<nav class="pagination">

					<?php if($posts->pagination()->hasNextPage()): ?>
						<a class="next" href="<?= $posts->pagination()->nextPageURL() ?>"><h2>Next</h2></a>
					<?php endif ?>

					<?php if($posts->pagination()->hasPrevPage()): ?>
						<a class="prev" href="<?= $posts->pagination()->prevPageURL() ?>"><h2>Previous</h2></a>
					<?php endif ?>

				</nav>
			<?php endif ?>
		</div>
	</div>
</section>
<?php endif ?>

</div>


<?php snippet('footer') ?>