<section class="share-buttons">
	<ul>
		<li>Partager</li>
		<li>
			<a href="http://www.facebook.com/sharer.php?u=<?= rawurlencode ($post->url()); ?>" target="blank" title="Share on Facebook">
				Facebook
			</a>
		</li>
		<li>
			<a href="https://twitter.com/intent/tweet?source=webclient&text=<?= rawurlencode(site()->title().' | '.$post->title()); ?>%20<?= rawurlencode($post->url()); ?>" target="blank" title="Tweet this">Twitter</a>
		</li>
		<li>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= rawurlencode($post->url()); ?>&title=<?= rawurlencode(site()->title().' | '.$post->title()); ?>&summary=<?= rawurlencode ($post->text()); ?>&source=" target="blank" title="Share on Linkedin">Linkedin</a>
		</li>
		<li>
			<a href="<?= $post->url() ?>" target="blank">Autre</a>
		</li>
	</ul>
</section>