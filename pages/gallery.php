<?php $galleryItem = new GalleryItem($_REQUEST['category']) ?>
<h2><a href="index.php?page=gallery&category=<?= $_REQUEST['category'] ?>"><?= $galleryItem->getName() ?></a></h2>

<div class="gallery_text">
	<?php Context::getInstance()->galleryManager->includeCategoryIndex($_REQUEST['category']) ?>
	<?php Context::getInstance()->pageService->sectionEditable("categoryTextEdit") ?>
</div>

<ul class="sige">
	
	<?php foreach (Context::getInstance()->galleryManager->getImagesWithinCategory($_REQUEST['category']) as $image) { ?>
		<li class="sige_cont_0">
			<span class="sige_thumb">
				<a href="gallery/<?= $_REQUEST['category'] ?>/<?= $image ?>" rel="lightbox-cat" title="<?= $image ?>" >
					<img alt="<?= $image ?>" title="<?= $image ?>" src="gallery/<?= $_REQUEST['category'] ?>/thumbs/<?= $image ?>" />
				</a>
			</span>
			<span class="sige_caption"><?= $image ?></span>
		</li>
	<?php } ?>
	
</ul>

<?php Context::getInstance()->pageService->includePopup("categoryTextEdit"); ?>
