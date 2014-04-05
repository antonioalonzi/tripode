<div>
	<p><?= Context::getInstance()->translator->translate("contacts.changeContacts") ?></p>
	<form action="?action=contactsEdit" method="post" class="form-horizontal">
		<fieldset class="well">
			<div class="control-group">
				<div class="control-label"><label id="contactName-lbl" for="contactName"><?= Context::getInstance()->translator->translate("contacts.name") ?>:</label></div>
				<div class="controls"><input type="text" name="contactName" id="contactName" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactName ?>" size="25" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="contactSurname-lbl" for="contactSurname"><?= Context::getInstance()->translator->translate("contacts.surname") ?>:</label></div>
				<div class="controls"><input type="text" name="contactSurname" id="contactSurname" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactSurname ?>" size="25" /></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><label id="contactAddress-lbl" for="contactAddress"><?= Context::getInstance()->translator->translate("contacts.address") ?>:</label></div>
				<div class="controls"><input type="text" name="contactAddress" id="contactAddress" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactAddress ?>" size="25" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="contactCity-lbl" for="contactCity"><?= Context::getInstance()->translator->translate("contacts.city") ?>:</label></div>
				<div class="controls"><input type="text" name="contactCity" id="contactCity" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactCity ?>" size="25" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="contactPostcode-lbl" for="contactPostcode"><?= Context::getInstance()->translator->translate("contacts.postcode") ?>:</label></div>
				<div class="controls"><input type="text" name="contactPostcode" id="contactPostcode" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactPostcode ?>" size="10" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="contactCountry-lbl" for="contactCountry"><?= Context::getInstance()->translator->translate("contacts.country") ?>:</label></div>
				<div class="controls"><input type="text" name="contactCountry" id="contactCountry" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactCountry ?>" size="25" /></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><label id="contactTelephone-lbl" for="contactTelephone"><?= Context::getInstance()->translator->translate("contacts.telephone") ?>:</label></div>
				<div class="controls"><input type="text" name="contactTelephone" id="contactTelephone" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactTelephone ?>" size="25" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="contactMobile-lbl" for="contactMobile"><?= Context::getInstance()->translator->translate("contacts.mobile") ?>:</label></div>
				<div class="controls"><input type="text" name="contactMobile" id="contactMobile" value="<?= Context::getInstance()->configurationService->getConfiguration()->contactMobile ?>" size="25" /></div>
			</div>
			
			<div class="controls"><button type="submit" class="btn btn-primary"><? echo Context::getInstance()->translator->translate("action.save") ?></button></div>
		</fieldset>
	</form>
</div>
