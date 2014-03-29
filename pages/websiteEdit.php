<div>
	<p><?= Context::getInstance()->translationService->translate("website.changeConfiguration") ?></p>
	<form action="?action=websiteEdit" method="post" class="form-horizontal">
		<fieldset class="well">
			<div class="control-group">
				<div class="control-label"><label id="name-lbl" for="name" class="required"><?= Context::getInstance()->translationService->translate("website.name") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="text" name="name" id="name" value="<?= Context::getInstance()->configurationService->getConfiguration()->name ?>" size="25" required aria-required="true" /></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><label id="description-lbl" for="description"><?= Context::getInstance()->translationService->translate("website.description") ?></label></div>
				<div class="controls"><input type="text" name="description" id="description" value="<?= Context::getInstance()->configurationService->getConfiguration()->description ?>" size="30" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="author-lbl" for="author"><?= Context::getInstance()->translationService->translate("website.author") ?></label></div>
				<div class="controls"><input type="text" name="author" id="author" value="<?= Context::getInstance()->configurationService->getConfiguration()->author ?>" size="30" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="lang-lbl" for="lang"><?= Context::getInstance()->translationService->translate("website.lang") ?></label></div>
				<div class="controls">
					<select name="lang" id="lang">
						<option value="en-en" <?= Context::getInstance()->configurationService->getConfiguration()->lang == "en-en"?'selected="selected"':'' ?>><?= Context::getInstance()->translationService->translate("lang.english") ?></option>
						<option value="it-it" <?= Context::getInstance()->configurationService->getConfiguration()->lang == "it-it"?'selected="selected"':'' ?>><?= Context::getInstance()->translationService->translate("lang.italian") ?></option>
						<option value="es-es" <?= Context::getInstance()->configurationService->getConfiguration()->lang == "es-es"?'selected="selected"':'' ?>><?= Context::getInstance()->translationService->translate("lang.spanish") ?></option>
					</select>
				</div>
			</div>
			
			<div class="controls"><button type="submit" class="btn btn-primary"><?= Context::getInstance()->translationService->translate("action.save") ?></button></div>
		</fieldset>
	</form>
</div>
