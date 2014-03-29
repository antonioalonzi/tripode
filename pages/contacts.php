<div class="contact">
	
	<?php Context::getInstance()->pageService->sectionEditable("popup-edit-contacts") ?>
	
	<div class="page-header">
		<h2><span class="contact-name"><?= Context::getInstance()->configurationService->getConfiguration()->contactName ?> <?= Context::getInstance()->configurationService->getConfiguration()->contactSurname ?></span></h2>
	</div>
	
	<div id="slide-contact" class="accordion">
		<dl class="contact-address dl-horizontal">
			<dt><span class="jicons-icons" ><img src="img/con_address.png" alt="<?= Context::getInstance()->translationService->translate("contacts.address") ?>: " title="<?= Context::getInstance()->translationService->translate("contacts.address") ?>: " /></span></dt>
			<dd><span class="contact-street"><?= Context::getInstance()->configurationService->getConfiguration()->contactAddress ?><br/></span></dd>
			<dd><span class="contact-suburb"><?= Context::getInstance()->configurationService->getConfiguration()->contactCity ?> <?= Context::getInstance()->configurationService->getConfiguration()->contactPostcode ?><br/></span></dd>
			<dd><span class="contact-country"><?= Context::getInstance()->configurationService->getConfiguration()->contactCountry ?><br/></span></dd>
			
			<dt><span class="jicons-icons" ><img src="img/con_tel.png" alt="<?= Context::getInstance()->translationService->translate("contacts.telephone") ?>: " title="<?= Context::getInstance()->translationService->translate("contacts.telephone") ?>: "/></span></dt>
			<dd><span class="contact-telephone"><?= Context::getInstance()->configurationService->getConfiguration()->contactTelephone ?></span></dd>
			
			<dt><span class="jicons-icons" ><img src="img/con_mobile.png" alt="<?= Context::getInstance()->translationService->translate("contacts.mobile") ?>: " title="<?= Context::getInstance()->translationService->translate("contacts.mobile") ?>: " /></span></dt>
			<dd><span class="contact-mobile"><?= Context::getInstance()->configurationService->getConfiguration()->contactMobile ?></span></dd>
		</dl>
	</div>
	
	<?php Context::getInstance()->pageService->includePopup("popup-edit-contacts", "contactsEdit"); ?> 
</div>
