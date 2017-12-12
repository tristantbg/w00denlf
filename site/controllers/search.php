<?php

return function ($site, $pages, $page) {
	$types = $site->index()->filterBy('intendedTemplate', 'type')->visible();
	$categories = $site->index()->filterBy('intendedTemplate', 'category')->visible();
	$menuPages = $site->index()->filterBy('intendedTemplate', 'default')->visible();
	$query   = get('q');
  	$results = $site->index()->visible()->filterBy('intendedTemplate', 'in', ['default', 'article'])->search($query, 'title|text|maintext|chapeau|sections');

	return array(
	'types' => $types,
	'categories' => $categories,
	'menuPages' => $menuPages,
	'query'      => $query,
    'posts'    => $results
	);
}

?>
