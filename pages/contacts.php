<div class="contact">
	<div class="page-header">
		<h2><span class="contact-name"><?= Context::getInstance()->configuration->contactName ?> <?= Context::getInstance()->configuration->contactSurname ?></span></h2>
	</div>
						
	<div id="slide-contact" class="accordion">		
		<dl class="contact-address dl-horizontal">
			<dt><span class="jicons-icons" ><img src="img/con_address.png" alt="<?= Context::getInstance()->translationService->translate("contacts.address") ?>: " title="<?= Context::getInstance()->translationService->translate("contacts.address") ?>: " /></span></dt>
			<dd><span class="contact-street"><?= Context::getInstance()->configuration->contactAddress ?><br/></span></dd>
			<dd><span class="contact-suburb"><?= Context::getInstance()->configuration->contactCity ?> <?= Context::getInstance()->configuration->contactPostcode ?><br/></span></dd>
			<dd><span class="contact-country"><?= Context::getInstance()->configuration->contactCountry ?><br/></span></dd>
			
			<dt><span class="jicons-icons" ><img src="img/con_tel.png" alt="<?= Context::getInstance()->translationService->translate("contacts.telephone") ?>: " title="<?= Context::getInstance()->translationService->translate("contacts.telephone") ?>: "/></span></dt>
			<dd><span class="contact-telephone"><?= Context::getInstance()->configuration->contactTelephone ?></span></dd>
			
			<dt><span class="jicons-icons" ><img src="img/con_mobile.png" alt="<?= Context::getInstance()->translationService->translate("contacts.mobile") ?>: " title="<?= Context::getInstance()->translationService->translate("contacts.mobile") ?>: " /></span></dt>
			<dd><span class="contact-mobile"><?= Context::getInstance()->configuration->contactMobile ?></span></dd>
		</dl>
	</div> 
</div>
