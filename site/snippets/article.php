<?php 
if (isset($postTypes) && $post->type()->isNotEmpty()){
	$type = $postTypes->{$post->type()};
} else {
	$type = null;
}
?>
<div class="blog-item<?php e(isset($lastPost) && $post->is($lastPost), ' last-post') ?>">
	<div class="item-header">
		<h2 class="blog-item--title">
			<a href="<?= $post->url() ?>"><?= $post->title()->html() ?></a>
		</h2>
		<div class="blog-item--type">
		<?php if($type): ?>
			<a href="<?= $type->url() ?>"><?= $type->title()->html() ?></a>
		<?php elseif(isset($typeMode) && $typeMode): ?>
			<a href="<?= $post->parent()->url() ?>"><?= $post->parent()->title()->html() ?></a>
		<?php endif ?>
		</div>
		<div class="blog-item--date">
			<?= $post->date("d.m.Y") ?>
		</div>
	</div>
	<div class="item-chapeau">
		<?= $post->text()->kt() ?>
	</div>
	<div class="item-content">
		<?php foreach($post->sections()->toStructure() as $section): ?>
		  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
		<?php endforeach ?>
	</div>
</div>