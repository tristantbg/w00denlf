<?php

return function ($site, $pages, $page) {
	$types = $site->index()->filterBy('intendedTemplate', 'type')->visible();
	$categories = $site->index()->filterBy('intendedTemplate', 'category')->visible();
	$menuPages = $site->index()->filterBy('intendedTemplate', 'default')->visible();
	$postTypes = (object) array();
	foreach ($types as $type) {
		$id = $type->autoid();
		$postTypes->{$id} = $type;
	}

	return array(
	'types' => $types,
	'postTypes' => $postTypes,
	'categories' => $categories,
	'menuPages' => $menuPages,
	);
}

?>
