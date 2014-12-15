<div>
	<p><?= Context::getInstance()->translator->translate("banners.title") ?></p>
	
	<form action="?action=banner" method="post" class="form-vertical">
		<input type="hidden" name="bannerAction" value="setBanner" />
		<div class="control-group">
			<div class="controls">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<?php $bannerSelected = Context::getInstance()->bannerManager->hasBanner() ? '' : 'bannerSelected' ?>
							<td width="*">
								<?php if ($bannerSelected == 'bannerSelected') { ?>
									<span class="<?= $bannerSelected ?>"><?= Context::getInstance()->translator->translate("general.none") ?></span>
								<?php } else { ?>
									<a class="methodPost <?= $bannerSelected ?>" href="?action=banner&bannerAction=setBanner&banner=None" class="<?= $bannerSelected ?>"><?= Context::getInstance()->translator->translate("general.none") ?></a>
								<?php } ?>
							</td>
							<td width="120px"></td>
						</tr>
						<?php $i = 0 ?>
						<?php foreach (Context::getInstance()->bannerManager->getAllBanners() as $banner) { ?>
							<?php $bannerSelected = Context::getInstance()->bannerManager->getBanner() == $banner ? 'bannerSelected' : '' ?>
							<tr>
								<td width="*">
									<?php if ($bannerSelected == 'bannerSelected') { ?>
										<span class="<?= $bannerSelected ?>"><?= $banner ?></span>
									<?php } else { ?>
										<a class="methodPost" href="?action=banner&bannerAction=setBanner&banner=<?= urlencode($banner) ?>"><?= $banner ?></a>
									<?php } ?>
								</td>
								<td width="120px">
									<?php if ($banner != "tripod.jpg") { ?>
										<!-- Rename Icon -->
										<!-- 
										<a class="renameCategoryButton" href="#<?= $i ?>" title="<?= Context::getInstance()->translator->translate("general.rename") ?>">
											<img alt="<?= Context::getInstance()->translator->translate("general.rename") ?>" src="img/icons/rename.png" />
										</a>
										 -->
										
										<!-- Delete Icon -->
										<a class="methodPostConfirm" confirmationMessage="<?= Context::getInstance()->translator->translate("general.confirmationMessage") ?>" href="?action=banner&bannerAction=deleteBanner&banner=<?= urlencode($banner) ?>" title="<?= Context::getInstance()->translator->translate("general.delete") ?>">
											<img alt="<?= Context::getInstance()->translator->translate("general.delete") ?>" src="img/icons/delete.png" />
										</a>
									<?php } ?>
								</td>
							</tr>
							<?php $i++ ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</form>
	
</div>
