<?php

echo page('blog')->grandChildren()->visible()->flip()->limit(20)->feed(array(
  'title'       => site()->title().' Feed',
  'description' => 'Lire les derniers posts de '.site()->title(),
  'link'        => 'blog'
));