<?php 
if (isset($postTypes) && $post->type()->isNotEmpty()){
	$type = $postTypes->{$post->type()};
} else {
	$type = null;
}
?>
<div class="blog-item<?php e(isset($lastPost) && $post->is($lastPost), ' last-post') ?>">
	<div class="blog-item--header">
		<div class="blog-item--infos">
			<div class="blog-item--date">
				<?= $post->date("d.m.Y") ?>
			</div>
			<div class="blog-item--type">
			<?php if($type): ?>
				<a href="<?= $type->url() ?>"><?= $type->title()->html() ?></a>
			<?php elseif(isset($typeMode) && $typeMode): ?>
				<a href="<?= $post->parent()->url() ?>"><?= $post->parent()->title()->html() ?></a>
			<?php endif ?>
			</div>
		</div>
		<a class="blog-item--title" href="<?= $post->url() ?>">
			<h2><?= $post->title()->html() ?></h2>
			<?php if($post->subtitle()->isNotEmpty()): ?>
			<h3><?= $post->subtitle()->html() ?></h3>
			<?php endif ?>
		</a>
	</div>
	<?php if($post->featured()->isNotEmpty() && $featured = $post->featured()->toFile()): ?>
		<div class="blog-item--featured">
			<img src="<?= $featured->thumb('slider')->url() ?>" alt="<?= $post->title()->html() . c::get('alt') ?>" width="100%">
		</div>
	<?php endif ?>
	<div class="blog-item--chapeau">
		<?= $post->text()->kt() ?>
	</div>
	<div class="blog-item--content">
		<?php foreach($post->sections()->toStructure() as $section): ?>
		  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section, 'page' => $post)) ?>
		<?php endforeach ?>
	</div>
</div>