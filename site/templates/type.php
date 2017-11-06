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
	window.location = window.location.href.replace("types/", "types/#");
</script>
<?php endif ?>

<div id="blog-categories" class="sections-slider">

	<?php $posts = $postsCollection->filterBy('type','==',$page->autoid()) ?>
	<?php if ($posts->count() > 0): ?>
	<section class="blog-section" id="<?= $page->uid() ?>" data-title="<?= $page->title()->escape() ?>">
		<?php 
		$style = "";
		if($page->featured()->isNotEmpty()) $style .= "background-image: url(".$page->featured()->toFile()->thumb(c::get('thumbs-category'))->url().");";
		// if($type->featuredcolor()->isNotEmpty()) $style .= "background-color: " . $type->featuredcolor() . ";";
		?>
		<?php if($style != ""): ?>
			<div class="blog-category--image invert" style="<?= $style ?>"></div>
		<?php endif ?>
		<div class="blog-posts">
			<div class="blog-posts--inner">
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
			</div>
		</div>
	</section>
	<?php endif ?>

</div>


<?php snippet('footer') ?>