<section class="post-content content--images">
	<?php foreach ($data->medias()->toStructure() as $key => $image): ?>
		<?php 
			$image = $image->toFile();
			if ($image->caption()->isNotEmpty()) {
				$caption = $image->caption()->escape();
			} else {
				$page = $image->page();
				$caption = $page->title()->escape().c::get('alt');
			}
		?>
		<div class="cell">
			<img class="lazyload" data-flickity-lazyload="<?= $image->thumb(c::get('thumbs-slider'))->url() ?>" alt="<?= $caption ?>" height="100%" />
			<noscript>
				<img class="lazyload" src="<?= $image->thumb(c::get('thumbs-slider'))->url() ?>" alt="<?= $caption ?>" height="100%" />
			</noscript>
		</div>
	<?php endforeach ?>
</section>