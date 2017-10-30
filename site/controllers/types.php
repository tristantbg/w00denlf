<?php

return function ($site, $pages, $page) {
	$types = $page->children()->visible();
	$categories = $site->index()->filterBy('intendedTemplate', 'category')->visible();
	$postsCollection = $site->homePage()->grandChildren()->visible()->sortBy('date', 'desc');
	$lastPost = $types->filterBy('autoid', $postsCollection->first()->type()->value());
	$menuPages = $site->index()->filterBy('intendedTemplate', 'default')->visible();

	return array(
	'types' => $types,
	'categories' => $categories,
	'postsCollection' => $postsCollection,
	'lastPost' => $lastPost,
	'menuPages' => $menuPages,
	);
}

?>
