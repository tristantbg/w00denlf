<?php $location = $data->location()->yaml(); ?>

<?php if($location['lat'] && $location['lng']): ?>
<section class="post-content content--map">
	<?php

	echo $page->styledmap(			// or $site->styledmap(
    null, 							// title
    [$location['lat'], $location['lng']],	// array, url, location or fieldname
    null,
    'woodenlife-map-style2' 		// optional: name of style snippet
	);

	?>
</section>
<?php endif ?>