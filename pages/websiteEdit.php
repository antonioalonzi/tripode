<div>
	<p><?= Context::getInstance()->translator->translate("website.changeConfiguration") ?></p>
	<form action="?action=websiteEdit" method="post" class="form-horizontal">
		<fieldset class="well">
			<div class="control-group">
				<div class="control-label"><label id="name-lbl" for="name" class="required"><?= Context::getInstance()->translator->translate("website.name") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="text" name="name" id="name" value="<?= Context::getInstance()->configurationManager->getConfiguration()->websiteName ?>" size="25" required aria-required="true" /></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><label id="description-lbl" for="description"><?= Context::getInstance()->translator->translate("website.description") ?></label></div>
				<div class="controls"><input type="text" name="description" id="description" value="<?= Context::getInstance()->configurationManager->getConfiguration()->websiteDescription ?>" size="30" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="author-lbl" for="author"><?= Context::getInstance()->translator->translate("website.author") ?></label></div>
				<div class="controls"><input type="text" name="author" id="author" value="<?= Context::getInstance()->configurationManager->getConfiguration()->websiteAuthor ?>" size="30" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="lang-lbl" for="lang"><?= Context::getInstance()->translator->translate("website.lang") ?></label></div>
				<div class="controls">
					<select name="lang" id="lang">
						<option value="en-en" <?= Context::getInstance()->configurationManager->getConfiguration()->websiteLang == "en-en"?'selected="selected"':'' ?>><?= Context::getInstance()->translator->translate("lang.english") ?></option>
						<option value="it-it" <?= Context::getInstance()->configurationManager->getConfiguration()->websiteLang == "it-it"?'selected="selected"':'' ?>><?= Context::getInstance()->translator->translate("lang.italian") ?></option>
						<option value="es-es" <?= Context::getInstance()->configurationManager->getConfiguration()->websiteLang == "es-es"?'selected="selected"':'' ?>><?= Context::getInstance()->translator->translate("lang.spanish") ?></option>
					</select>
				</div>
			</div>
			
			<div class="controls"><button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("action.save") ?></button></div>
		</fieldset>
	</form>
</div>
