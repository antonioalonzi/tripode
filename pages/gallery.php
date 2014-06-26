<?php $galleryItem = new GalleryItem($_REQUEST['category']) ?>
<h2><a href="index.php?page=gallery&category=<?= $_REQUEST['category'] ?>"><?= $galleryItem->getName() ?></a></h2>

<div class="gallery_text">
	<?php Context::getInstance()->galleryManager->includeCategoryIndex($_REQUEST['category']) ?>
	<?php Context::getInstance()->pageService->sectionEditable("categoryTextEdit") ?>
</div>

<ul class="sige">
	
	<?php $userLoggedIn = Context::getInstance()->authenticationManager->isAdminUserLoggedIn() ?>
	<?php $images = Context::getInstance()->galleryManager->getImagesWithinCategory($_REQUEST['category'], $userLoggedIn) ?>
	<?php $lastPosition = 0 ?>
	<?php foreach ($images as $image) { ?>
		<?php $lastPosition = $image->getPosition() ?>
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
				<a class="renameImageButton" href="#<?= $image->getFileName() ?>|<?= $image->getName() ?>" title="<?= Context::getInstance()->translator->translate("general.rename") ?>">
					<img alt="<?= Context::getInstance()->translator->translate("general.rename") ?>" src="img/icons/rename.png" />
				</a>
				
				<!-- Delete Icon -->
				<a class="methodPostConfirm" confirmationMessage="<?= Context::getInstance()->translator->translate("general.confirmationMessage") ?>" href="?action=gallery&galleryAction=deleteImage&category=<?= $_REQUEST['category']?>&image=<?= $image->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.delete") ?>">
					<img alt="<?= Context::getInstance()->translator->translate("general.delete") ?>" src="img/icons/delete.png" />
				</a>
			</div>
			<?php } ?>
			
			<?php $imageClass = $image->isHidden() ? "hiddenImage" : "" ?>
			<span class="sige_thumb <?= $imageClass ?>">
				<a href="gallery/<?= $_REQUEST['category'] ?>/<?= $image->getFilename() ?>" rel="lightbox-cat" title="<?= $image->getName() ?>" >
					<img alt="<?= $image->getName() ?>" title="<?= $image->getName() ?>" src="gallery/<?= $_REQUEST['category'] ?>/thumbs/<?= $image->getFilename() ?>" />
				</a>
			</span>
			<span class="sige_caption"><?= $image->getName() ?></span>
		</li>
	<?php } ?>
	
	<?php if (Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) { ?>
	<li class="sige_cont_0">
		<span class="sige_thumb">
			<a id="uploadPhotos" href="#uploadPhotos" title="<?= Context::getInstance()->translator->translate("gallery.uploadPhotos.uploadAction") ?>" >
				<img alt="<?= Context::getInstance()->translator->translate("gallery.uploadPhotos.uploadAction") ?>Photos" title="<?= Context::getInstance()->translator->translate("gallery.uploadPhotos.uploadAction") ?>" src="img/icons/addPhotos.png" />
			</a>
		</span>
	</li>
<?php } ?>
	
</ul>



<div id="popup-renameGalleryImage" class="editPopup" style="display: none">
	<a href="#popup-renameGalleryImage" class="closePopup"><img src="img/icons/close.png" class="pull-right" /></a>
	<div class="editPopupContainer">
		<?= Context::getInstance()->translator->translate("gallery.renameImage.rename") ?>
		<span id="renameFileName"></span>
		<?= Context::getInstance()->translator->translate("gallery.renameImage.to") ?>:
		<form action="?action=gallery&galleryAction=renameImage&category=<?= $_REQUEST['category']?>" method="post" class="form-horizontal">
			<fieldset class="well">
				<input type="hidden" name="renameOldFileName" id="renameOldFileName" value="" />
				
				<div class="control-group">
					<div class="control-label"><label id="renameNewName-lbl" for="renameNewName"><?= Context::getInstance()->translator->translate("gallery.renameImage.newName") ?></label></div>
					<div class="controls"><input type="text" name="renameNewName" id="renameNewName" value="" required aria-required="true" size="25" /></div>
				</div>
				
				<div class="controls">
					<button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("action.save") ?></button>
				</div>
			</fieldset>
		</form>
	</div>
</div>



<div id="popup-uploadPhotos" class="editPopup" style="display: none">
	<a href="#popup-uploadPhotos" class="closePopup"><img src="img/icons/close.png" class="pull-right" /></a>
	<div class="editPopupContainer">
		<?= Context::getInstance()->translator->translate("gallery.uploadPhotos.uploadPhotosMessage") ?>
		<form action="?action=gallery&galleryAction=uploadPhotos&category=<?= $_REQUEST['category']?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			<fieldset class="well">
				<input type="hidden" name="position" id="position" value="<?= $lastPosition + 1 ?>" />
				<div class="control-group">
					<div class="control-label"><label id="uploadPhotos-lbl" for="uploadPhotos"><?= Context::getInstance()->translator->translate("gallery.uploadPhotos.uploadPhotosPhotoLabel") ?></label></div>
					<div class="controls"><input type="file" name="uploadPhotos[]" id="uploadPhotos" value="" multiple="multiple" /></div>
				</div>
				
				<div class="controls">
					<button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("action.save") ?></button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
