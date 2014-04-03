<div>
	<p><?= Context::getInstance()->translationService->translate("gallery.editCategories") ?></p>
	<form action="?action=gallery" method="post" class="form-horizontal">
		<table class="table table-striped table-bordered">
			<tbody>
				<?php foreach (Context::getInstance()->galleryService->getGalleryCategories() as $category) { ?>
				<tr>
					<td><?= $category ?></td>
					<td>
						<a href="?action=gallery&galleryAction=hide&category=<?= $category?>"><img alt="<?= Context::getInstance()->translationService->translate("gallery.actionHide") ?>" /></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</form>
</div>
