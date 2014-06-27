<div>
	<p><?= Context::getInstance()->translator->translate("banners.title") ?></p>
	
	<form action="?action=banner" method="post" class="form-vertical">
		<input type="hidden" name="bannerAction" value="setBanner" />
		<div class="control-group">
			<div class="controls">
				<select name="banner">
					<?php $noneSelected = Context::getInstance()->bannerManager->hasBanner() ? '' : 'selected="Selected"' ?>
					<option value="None" <?= $noneSelected ?>><?= Context::getInstance()->translator->translate("general.none") ?></option>
					
					<?php foreach (Context::getInstance()->bannerManager->getAllBanners() as $banner) { ?>
						<?php $selected = Context::getInstance()->bannerManager->getBanner() == $banner ? 'selected="Selected"' : '' ?>
						<option value="<?= $banner ?>" <?= $selected ?>><?= $banner ?></option>
					<?php } ?>
				</select> 
			</div>
		</div>
		<div class="controls">
			<button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("action.save") ?></button>
		</div>
	</form>
	
</div>
