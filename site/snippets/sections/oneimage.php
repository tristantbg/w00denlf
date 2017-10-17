<?php if($image = $data->get("first")->toFile()): ?>
<?php 
	if ($image->caption()->isNotEmpty()) {
		$caption = $image->caption()->escape();
	} else {
		$page = $image->page();
		$caption = $page->title()->escape().c::get('alt');
	}
?>
<section class="post-content content--image">
	<img class="lazy lazyload" data-src="<?= $image->thumb(c::get('thumbs-slider'))->url() ?>" alt="<?= $caption ?>" width="100%" />
	<div class="ph" style="padding-bottom: <?= 100 / $image->ratio() ?>%"></div>
	<noscript>
		<img src="<?= $image->thumb(c::get('thumbs-slider'))->url() ?>" alt="<?= $caption ?>" width="100%" />
	</noscript>
</section>
<?php endif ?>