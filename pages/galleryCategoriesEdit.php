<div>
	<p><?= Context::getInstance()->translator->translate("gallery.editCategories") ?></p>
	<form action="?action=gallery" method="post" class="form-horizontal">
		<table class="table table-striped table-bordered">
			<tbody>
				<?php $i = 0 ?>
				<?php $categories = Context::getInstance()->galleryManager->getGalleryCategories(true) ?>
				<?php foreach ($categories as $categoryItem) { ?>
				<tr>
					<td width="10%"><?= $categoryItem->getPosition() ?></td>
					<td width="*"><?= $categoryItem->getName() ?></td>
					<td width="100px">
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
						
						<!-- Delete -->
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
						<a id="addCategoryButton" title="<?= Context::getInstance()->translator->translate("general.add") ?>" href="#">
							<img alt="<?= Context::getInstance()->translator->translate("general.add") ?>" src="img/icons/add.png" />
						</a>
						<div id="addCategoryForm" style="display: none">
							<input type="hidden" name="position" value="[<?= $i ?>]" />
							<input type="hidden" name="galleryAction" value="addCategory" />
							<input type="text" id="categoryName" name="categoryName" value="" required aria-required="true" />
							<input type="submit" value="<?= Context::getInstance()->translator->translate("general.ok") ?>" class="btn btn-primary" />
						</div>
					</td>
					<td>
						<div id="addCategoryCancel" style="display: none">
							<input type="reset" value="<?= Context::getInstance()->translator->translate("general.cancel") ?>" class="btn btn-primary" />
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
