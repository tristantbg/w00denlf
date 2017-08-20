<?php

return function ($site, $pages, $page) {
	$types = $page->children()->visible();
	$categories = $site->index()->filterBy('intendedTemplate', 'category')->visible();
	$menuPages = $site->index()->filterBy('intendedTemplate', 'default')->visible();

	return array(
	'types' => $types,
	'categories' => $categories,
	'menuPages' => $menuPages,
	);
}

?>
