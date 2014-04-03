<div>
	<p><?= Context::getInstance()->translationService->translate("gallery.editCategories") ?></p>
	<form action="?action=gallery" method="post" class="form-horizontal">
		<table class="table table-striped table-bordered">
			<tbody>
				<?php foreach (Context::getInstance()->galleryService->getGalleryCategories(true) as $category) { ?>
				<tr>
					<td><?= $category ?></td>
					<td>
						<?php if (!Context::getInstance()->galleryService->isHidden($category)) { ?>
							<a class="methodPost" href="?action=gallery&galleryAction=hide&category=<?= $category?>"><img alt="<?= Context::getInstance()->translationService->translate("gallery.actionHide") ?>" /></a>
						<?php } else { ?>
							<a class="methodPost" href="?action=gallery&galleryAction=show&category=<?= $category?>"><img alt="<?= Context::getInstance()->translationService->translate("gallery.actionShow") ?>" /></a>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</form>
</div>
