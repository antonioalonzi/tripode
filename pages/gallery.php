<?php $galleryItem = new GalleryItem($_REQUEST['category']) ?>
<h2><a href="index.php?page=gallery&category=<?= $_REQUEST['category'] ?>"><?= $galleryItem->getName() ?></a></h2>

<div class="gallery_text">
	<?php Context::getInstance()->galleryManager->includeCategoryIndex($_REQUEST['category']) ?>
	<?php Context::getInstance()->pageService->sectionEditable("categoryTextEdit") ?>
</div>

<ul class="sige">
	
	<?php $i = 0 ?>
	<?php $userLoggedIn = Context::getInstance()->authenticationManager->isAdminUserLoggedIn() ?>
	<?php $images = Context::getInstance()->galleryManager->getImagesWithinCategory($_REQUEST['category'], $userLoggedIn) ?>
	<?php foreach ($images as $image) { ?>
		<li class="sige_cont_0">
			
			<?php if (Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) { ?>
			<div class="galleryEditPhoto">
				<!-- Position -->
				<?php if ($image->getPosition() > 0) { ?>
					<span><?= $image->getPosition() ?>.&nbsp;</span>
				<?php } ?>
				
				<!-- Left Icon -->
				<?php if ($image->getPosition() > 0) { ?>
					<a class="methodPost" href="?action=gallery&galleryAction=leftImage&category=<?= $_REQUEST['category']?>&image=<?= $image->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.actionLeft") ?>">
						<img alt="<?= Context::getInstance()->translator->translate("general.actionLeft") ?>" src="img/icons/left.png" />
					</a>
				<?php }?>
				
				<!-- Rigth Icon -->
				<a class="methodPost" href="?action=gallery&galleryAction=rightImage&category=<?= $_REQUEST['category']?>&image=<?= $image->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.actionRight") ?>">
					<img alt="<?= Context::getInstance()->translator->translate("general.actionRight") ?>" src="img/icons/right.png" />
				</a>
				
				<!-- Hide/Show Icon -->
				<?php if (!$image->isHidden()) { ?>
					<a class="methodPost" href="?action=gallery&galleryAction=hideImage&category=<?= $_REQUEST['category']?>&image=<?= $image->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.hide") ?>">
						<img alt="<?= Context::getInstance()->translator->translate("general.hide") ?>" src="img/icons/hide.png" />
					</a>
				<?php } else { ?>
					<a class="methodPost" href="?action=gallery&galleryAction=showImage&category=<?= $_REQUEST['category']?>&image=<?= $image->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.show") ?>">
						<img alt="<?= Context::getInstance()->translator->translate("general.show") ?>" src="img/icons/show.png" />
					</a>
				<?php } ?>
				
				<!-- Rename Icon -->
				<a class="renameImageButton" href="#<?= $i ?>" title="<?= Context::getInstance()->translator->translate("general.rename") ?>">
					<img alt="<?= Context::getInstance()->translator->translate("general.rename") ?>" src="img/icons/rename.png" />
				</a>
				
				<!-- Delete Icon -->
				<a class="methodPostConfirm" confirmationMessage="<?= Context::getInstance()->translator->translate("general.confirmationMessage") ?>" href="?action=gallery&galleryAction=deleteImage&image=<?= $image->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.delete") ?>">
					<img alt="<?= Context::getInstance()->translator->translate("general.delete") ?>" src="img/icons/delete.png" />
				</a>
			</div>
			<?php } ?>
			
			<span class="sige_thumb">
				<a href="gallery/<?= $_REQUEST['category'] ?>/<?= $image->getFilename() ?>" rel="lightbox-cat" title="<?= $image->getName() ?>" >
					<img alt="<?= $image->getName() ?>" title="<?= $image->getName() ?>" src="gallery/<?= $_REQUEST['category'] ?>/thumbs/<?= $image->getFilename() ?>" />
				</a>
			</span>
			<span class="sige_caption"><?= $image->getName() ?></span>
		</li>
	<?php } ?>
	
</ul>

<?php Context::getInstance()->pageService->includePopup("categoryTextEdit"); ?>
