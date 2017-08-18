<?php 
if (!$typeMode && $post->type()->isNotEmpty()){
	$type = $postTypes->{$post->type()};
} else {
	$type = null;
}
?>
<div class="blog-item<?php e($post->is($lastPost), ' last-post') ?>">
	<div class="item-header">
		<h2 class="blog-item--title">
			<?= $post->title()->html() ?>
		</h2>
		<div class="blog-item--type">
		<?php if($type): ?>
			<a href="<?= $type->url() ?>"><?= $type->title()->html() ?></a>
		<?php elseif($typeMode): ?>
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
		<?php foreach($page->sections()->toStructure() as $section): ?>
		  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
		<?php endforeach ?>
	</div>
</div>