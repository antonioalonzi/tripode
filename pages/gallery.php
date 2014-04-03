<h2><a href="index.php?page=gallery&category=<?php echo $_GET['category'] ?>"><?php echo $_GET['category'] ?></a></h2>

<div class="gallery_text"><?php Context::getInstance()->galleryService->includeCategoryIndex($_GET['category']) ?></div>

<ul class="sige">
	
	<?php foreach (Context::getInstance()->galleryService->getImagesWithinCategory($_GET['category']) as $image) { ?>
		<li class="sige_cont_0">
			<span class="sige_thumb">
				<a href="gallery/<?php echo $_GET['category'] ?>/<?php echo $image ?>" rel="lightbox-cat" title="<?php echo $image ?>" >
					<img alt="<?php echo $image ?>" title="<?php echo $image ?>" src="gallery/<?php echo $_GET['category'] ?>/thumbs/<?php echo $image ?>" />
				</a>
			</span>
			<span class="sige_caption"><?php echo $image ?></span>
		</li>
	<?php } ?>
	
</ul>

