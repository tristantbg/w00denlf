<?php

echo page('blog')->grandChildren()->visible()->flip()->limit(20)->feed(array(
  'title'       => site()->title().' Feed',
  'description' => 'Read the latest news about '.site()->title(),
  'link'        => 'blog'
));