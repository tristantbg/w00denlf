<?php snippet('header') ?>

<div id="blog-categories" class="sections-slider">

<?php foreach ($categories as $category): ?>

	<section class="blog-section" id="<?= $category->uid() ?>">
		<?php $posts = $category->children()->visible() ?>
		<?php if($category->featured()->isNotEmpty()): ?>
			<div class="blog-category--image" style="background-image: url(<?= $category->featured()->toFile()->thumb('category')->url() ?>)">
			</div>
		<?php endif ?>
		<div class="blog-posts">	
			<?php foreach ($posts as $post): ?>
				<?php $type = $postTypes->{$post->type()} ?>
				<div class="blog-item<?php e($post->is($lastPost), ' last-post') ?>">
					<div class="item-header">
						<h2 class="blog-item--title">
							<?= $post->title()->html() ?>
						</h2>
						<div class="blog-item--type">
							<a href="<?= $type->url() ?>"><?= $type->title()->html() ?></a>
						</div>
						<div class="blog-item--date">
							<?= $post->date("d.m.Y") ?>
						</div>
					</div>
					<div class="item-chapeau">
						<?= $post->text()->kt() ?>
					</div>
					<div class="item-content">
						
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>

<?php endforeach ?>

</div>

<?php snippet('footer') ?>