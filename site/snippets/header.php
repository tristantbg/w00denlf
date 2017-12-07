<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<link rel="alternate" type="application/rss+xml" href="<?php echo url('feed') ?>" title="<?= $site->title()->html() ?> Feed" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="canonical" href="<?php echo html($page->url()) ?>" />
	<?php if($page->isHomepage()): ?>
		<title><?= $site->title()->html() ?></title>
	<?php else: ?>
		<title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
	<?php endif ?>
	<?php if($page->isHomepage()): ?>
		<meta name="description" content="<?= $site->description()->html() ?>">
		<meta property="og:description" content="<?= $site->description()->html() ?>" />
	<?php else: ?>
		<meta name="DC.Title" content="<?= $page->title()->html() ?>" />
		<?php if(!$page->text()->empty()): ?>
			<meta name="description" content="<?= $page->text()->excerpt(250) ?>">
			<meta name="DC.Description" content="<?= $page->text()->excerpt(250) ?>"/ >
			<meta property="og:description" content="<?= $page->text()->excerpt(250) ?>" />
		<?php else: ?>
			<meta name="description" content="">
			<meta name="DC.Description" content=""/ >
			<meta property="og:description" content="" />
		<?php endif ?>
	<?php endif ?>
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">
	<?php if($page->isHomepage()): ?>
		<meta itemprop="name" content="<?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $site->title()->html() ?>" />
	<?php else: ?>
		<meta itemprop="name" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>" />
	<?php endif ?>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= html($page->url()) ?>" />
	<?php if($page->intendedTemplate() == "article"): ?>
		<?php if ($page->featured()->isNotEmpty() && $ogimage = $page->featured()->toFile()): ?>
			<?php $ogimage = $ogimage->width(1200) ?>
			<meta property="og:image" content="<?= $ogimage->url() ?>"/>
			<meta property="og:image:width" content="<?= $ogimage->width() ?>"/>
			<meta property="og:image:height" content="<?= $ogimage->height() ?>"/>
		<?php endif ?>
	<?php else: ?>
		<?php if($site->ogimage()->isNotEmpty() && $ogimage = $site->ogimage()->toFile()): ?>
			<?php $ogimage = $ogimage->width(1200) ?>
			<meta property="og:image" content="<?= $ogimage->url() ?>"/>
			<meta property="og:image:width" content="<?= $ogimage->width() ?>"/>
			<meta property="og:image:height" content="<?= $ogimage->height() ?>"/>
		<?php endif ?>
	<?php endif ?>

	<meta itemprop="description" content="<?= $site->description()->html() ?>">
	<link rel="shortcut icon" href="<?= url('assets/images/favicon.ico') ?>">
	<link rel="icon" href="<?= url('assets/images/favicon.ico') ?>" type="image/x-icon">

	<?php 
	echo css('assets/css/build/build.min.css?=v2');
	echo js('assets/js/vendor/modernizr.min.js');
	?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= url('assets/js/vendor/jquery.min.js') ?>">\x3C/script>')</script>

	<?php if(!$site->customcss()->empty()): ?>
		<style type="text/css">
			<?php echo $site->customcss()->html() ?>
		</style>
	<?php endif ?>

</head>

<?php $ptemplate = $page->intendedTemplate() ?>

<body>

<div id="outdated">
	<div class="inner">
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser.
	<br>Please <a href="http://outdatedbrowser.com" target="_blank">upgrade your browser</a> to improve your experience.</p>
	</div>
</div>

<div class="loader"></div>

<header>
	<div id="current-title" data-target="menu">
		<div id="site-title">
			<a href="<?= $site->url() ?>"><?= $site->title()->html() ?></a>
		</div>
		<div id="section-title" class="hidden"></div>
		<div id="menu-arrow">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 72.3 40.3" enable-background="new 0 0 72.3 40.3" xml:space="preserve">
			<g id="a-left">
				<rect x="-7" y="19" transform="matrix(0.7063 0.7079 -0.7079 0.7063 20.0134 -7.9577)" width="50.8" height="3"/>
			</g>			
			<g id="a-right">
				<rect x="50.7" y="-5.3" transform="matrix(0.7081 0.7061 -0.7061 0.7081 29.6006 -31.3242)" width="3" height="50.8"/>
			</g>			
			</svg>
		</div>
	</div>
	<div id="menu-background"></div>
	<div id="menu">
		<ul id="switch" class="inline-nav">
			<li<?php e($ptemplate != 'types', ' class="active"') ?> data-switch="category">
				Catégorie
			</li>
			<li<?php e($ptemplate == 'types', ' class="active"') ?> data-switch="type">
				Type
			</li>
		</ul>
		<ul class="navigation nav-category<?php e($ptemplate != 'types', ' active') ?>">
			<?php foreach ($categories as $category): ?>
				<li>
					<a href="<?= $category->parent()->url() . '#' . $category->uid() ?>" <?php e($ptemplate == 'blog', 'data-slider="'.$category->uid().'"') ?>>
						<?= $category->title()->html() ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
		<ul class="navigation nav-type<?php e($ptemplate == 'types', ' active') ?>">
			<?php foreach ($types as $type): ?>
				<li>
					<a href="<?= $type->parent()->url() . '#' . $type->uid() ?>" <?php e($ptemplate == 'types', 'data-slider="'.$type->uid().'"') ?>>
						<?= $type->title()->html() ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
		<form id="search" action="<?= page("search")->url() ?>">
		  <input type="search" placeholder="Recherche" name="q" value="<?php if(isset($query)) echo esc($query) ?>">
		  <!-- <input type="submit" value="Search"> -->
		</form>
		<ul id="socials" class="inline-nav">
			<?php foreach($site->socials()->yaml() as $social): ?>
				<li>
		    			<a href="<?php echo $social['link'] ?>" target="_blank"><?php echo $social['name'] ?></a>
		    		</li>
		    	<?php endforeach ?>
		</ul>
		<ul id="nav-pages" class="inline-nav">
			<?php foreach ($menuPages as $p): ?>
				<li><a href="<?= $p->url() ?>"><?= $p->title()->html() ?></a></li>
			<?php endforeach ?>
		</ul>
	</div>
</header>

<div id="container">