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
					<td width="80px">
						<!-- Up Icon -->
						<?php if ($categoryItem->getPosition() > 0) { ?>
							<a class="methodPost" href="?action=gallery&galleryAction=upCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("gallery.actionUp") ?>">
								<img alt="<?= Context::getInstance()->translator->translate("gallery.actionUp") ?>" src="img/icons/up.png" />
							</a>
						<?php } else {?>
							<img src="img/icons/empty.png" />
						<?php }?>
						<!-- Down Icon -->
						<a class="methodPost" href="?action=gallery&galleryAction=downCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("gallery.actionDown") ?>">
							<img alt="<?= Context::getInstance()->translator->translate("gallery.actionDown") ?>" src="img/icons/down.png" />
						</a>
						
						<!-- Hide/Show Icon -->
						<?php if (!$categoryItem->isHidden()) { ?>
							<a class="methodPost" href="?action=gallery&galleryAction=hideCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("gallery.actionHide") ?>">
								<img alt="<?= Context::getInstance()->translator->translate("gallery.actionHide") ?>" src="img/icons/hide.png" />
							</a>
						<?php } else { ?>
							<a class="methodPost" href="?action=gallery&galleryAction=showCategory&category=<?= $categoryItem->getFileName() ?>" title="<?= Context::getInstance()->translator->translate("gallery.actionShow") ?>">
								<img alt="<?= Context::getInstance()->translator->translate("gallery.actionShow") ?>" src="img/icons/show.png" />
							</a>
						<?php } ?>
					</td>
					<?php $i++ ?>
				</tr>
				<?php } ?>
				
				<tr>
					<td></td>
					<td><a title=""><img alt="" src="img/icons/add.png" /></a></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
