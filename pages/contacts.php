<div class="contact">
	
	<?php Context::getInstance()->pageService->sectionEditable("contactsEdit") ?>
	
	<div class="page-header">
		<h2><span class="contact-name"><?= Context::getInstance()->configurationManager->getConfiguration()->contactName ?> <?= Context::getInstance()->configurationManager->getConfiguration()->contactSurname ?></span></h2>
	</div>
	
	<div id="slide-contact" class="accordion">
		<dl class="contact-address dl-horizontal">
			<dt><span class="jicons-icons" ><img src="img/icons/address.png" alt="<?= Context::getInstance()->translator->translate("contacts.address") ?>: " title="<?= Context::getInstance()->translator->translate("contacts.address") ?>: " /></span></dt>
			<dd><span class="contact-street"><?= Context::getInstance()->configurationManager->getConfiguration()->contactAddress ?><br/></span></dd>
			<dd><span class="contact-suburb"><?= Context::getInstance()->configurationManager->getConfiguration()->contactCity ?> <?= Context::getInstance()->configurationManager->getConfiguration()->contactPostcode ?><br/></span></dd>
			<dd><span class="contact-country"><?= Context::getInstance()->configurationManager->getConfiguration()->contactCountry ?><br/></span></dd>
			
			<dt><span class="jicons-icons" ><img src="img/icons/telephone.png" alt="<?= Context::getInstance()->translator->translate("contacts.telephone") ?>: " title="<?= Context::getInstance()->translator->translate("contacts.telephone") ?>: "/></span></dt>
			<dd><span class="contact-telephone"><?= Context::getInstance()->configurationManager->getConfiguration()->contactTelephone ?></span></dd>
			
			<dt><span class="jicons-icons" ><img src="img/icons/mobile.png" alt="<?= Context::getInstance()->translator->translate("contacts.mobile") ?>: " title="<?= Context::getInstance()->translator->translate("contacts.mobile") ?>: " /></span></dt>
			<dd><span class="contact-mobile"><?= Context::getInstance()->configurationManager->getConfiguration()->contactMobile ?></span></dd>
		</dl>
	</div>
	
	<?php Context::getInstance()->pageService->includePopup("contactsEdit"); ?> 
</div>
