<section class="post-content content--images">
	<?php foreach ($data->medias()->toStructure() as $key => $image): ?>
		<div class="cell">
			<img src="<?= $image->toFile()->thumb('slider')->url() ?>" alt="" height="100%">
		</div>
	<?php endforeach ?>
</section>