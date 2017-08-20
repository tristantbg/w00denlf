<?php snippet('header') ?>

<?php 

function _bot_detected() {
  if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}
$bot = _bot_detected();
?>

<?php if(!$bot): ?>
<script>
	window.location = window.location.href.replace("blog/", "blog/#");
</script>
<?php endif ?>


<?php snippet('footer') ?>