<?php

return function ($site, $pages, $page) {
	$categories = $page->children()->visible();
	$types = $site->index()->filterBy('intendedTemplate', 'type')->visible();
	$menuPages = $site->index()->filterBy('intendedTemplate', 'default')->visible();
	$postsCollection = $page->grandChildren()->visible()->sortBy('date', 'desc');
	$lastPost = $postsCollection->first()->parent();
	$postTypes = (object) array();
	foreach ($types as $type) {
		$id = $type->autoid();
		$postTypes->{$id} = $type;
	}

	return array(
	'categories' => $categories,
	'types' => $types,
	'postTypes' => $postTypes,
	'menuPages' => $menuPages,
	'lastPost' => $lastPost
	);
}

?>
