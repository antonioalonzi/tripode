<div>
	<p><?= Context::getInstance()->translator->translate("gallery.editCategories") ?></p>
	<table class="table table-striped table-bordered">
		<tbody>
			<?php $i = 0 ?>
			<?php $categories = Context::getInstance()->galleryManager->getGalleryCategories(true) ?>
			<?php foreach ($categories as $categoryItem) { ?>
			<tr>
				<td width="24px"><?= $categoryItem->getPosition() ?></td>
				<td width="*">
					<div id="category<?= $i ?>Name"><?= $categoryItem->getName() ?></div>
					<div id="category<?= $i ?>Form" style="display:none">
						<form action="?action=gallery" method="post">
							<input type="hidden" name="galleryAction" value="renameCategory" />
							<input type="hidden" name="oldFilename" value="<?= $categoryItem->getFilename() ?>" />
							<input type="text" name="newCategoryName" value="<?= $categoryItem->getName() ?>" required aria-required="true" />
							<input type="submit" value="<?= Context::getInstance()->translator->translate("general.ok") ?>" class="btn btn-primary" />
							<input type="reset" value="<?= Context::getInstance()->translator->translate("general.cancel") ?>" class="btn btn-primary" />
						</form>
					</div>
				</td>
				<td width="120px">
					<!-- Up Icon -->
					<?php if ($categoryItem->getPosition() > 0) { ?>
						<a class="methodPost" href="?action=gallery&galleryAction=upCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.actionUp") ?>">
							<img alt="<?= Context::getInstance()->translator->translate("general.actionUp") ?>" src="img/icons/up.png" />
						</a>
					<?php } else {?>
						<img src="img/icons/empty.png" />
					<?php }?>
					<!-- Down Icon -->
					<a class="methodPost" href="?action=gallery&galleryAction=downCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.actionDown") ?>">
						<img alt="<?= Context::getInstance()->translator->translate("general.actionDown") ?>" src="img/icons/down.png" />
					</a>
					
					<!-- Hide/Show Icon -->
					<?php if (!$categoryItem->isHidden()) { ?>
						<a class="methodPost" href="?action=gallery&galleryAction=hideCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.hide") ?>">
							<img alt="<?= Context::getInstance()->translator->translate("general.hide") ?>" src="img/icons/hide.png" />
						</a>
					<?php } else { ?>
						<a class="methodPost" href="?action=gallery&galleryAction=showCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.show") ?>">
							<img alt="<?= Context::getInstance()->translator->translate("general.show") ?>" src="img/icons/show.png" />
						</a>
					<?php } ?>
					
					<!-- Rename Icon -->
					<a class="renameCategoryButton" href="#<?= $i ?>" title="<?= Context::getInstance()->translator->translate("general.rename") ?>">
						<img alt="<?= Context::getInstance()->translator->translate("general.rename") ?>" src="img/icons/rename.png" />
					</a>
					
					<!-- Delete Icon -->
					<a class="methodPostConfirm" confirmationMessage="<?= Context::getInstance()->translator->translate("general.confirmationMessage") ?>" href="?action=gallery&galleryAction=deleteCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("general.delete") ?>">
						<img alt="<?= Context::getInstance()->translator->translate("general.delete") ?>" src="img/icons/delete.png" />
					</a>
					
				</td>
				<?php $i++ ?>
			</tr>
			<?php } ?>
			
			<?php $i++ ?>
			<tr id="addCategoryRow">
				<td><span id="addCategoryPosition" style="display: none"><?= $i ?></span></td>
				<td>
					<form action="?action=gallery" method="post">
						<a id="addCategoryButton" title="<?= Context::getInstance()->translator->translate("general.add") ?>" href="#">
							<img alt="<?= Context::getInstance()->translator->translate("general.add") ?>" src="img/icons/add.png" />
						</a>
						<div id="addCategoryForm" style="display: none">
							<input type="hidden" name="position" value="[<?= $i ?>]" />
							<input type="hidden" name="galleryAction" value="addCategory" />
							<input type="text" name="categoryName" value="" required aria-required="true" />
							<input type="submit" value="<?= Context::getInstance()->translator->translate("general.ok") ?>" class="btn btn-primary" />
							<input type="reset" id="addCategoryCancelButton" value="<?= Context::getInstance()->translator->translate("general.cancel") ?>" class="btn btn-primary" />
						</div>
					</form>
				</td>
				<td>
				</td>
			</tr>
		</tbody>
	</table>
</div>
