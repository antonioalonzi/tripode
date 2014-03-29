<?php

class ContactsEditAction {
	
	public function execute() {
		
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		// change configuration
		Context::getInstance()->configurationService->getConfiguration()->contactName = $_POST['contactName'];
		Context::getInstance()->configurationService->getConfiguration()->contactSurname = $_POST['contactSurname'];
		Context::getInstance()->configurationService->getConfiguration()->contactAddress = $_POST['contactAddress'];
		Context::getInstance()->configurationService->getConfiguration()->contactCity = $_POST['contactCity'];
		Context::getInstance()->configurationService->getConfiguration()->contactPostcode = $_POST['contactPostcode'];
		Context::getInstance()->configurationService->getConfiguration()->contactCountry = $_POST['contactCountry'];
		Context::getInstance()->configurationService->getConfiguration()->contactTelephone = $_POST['contactTelephone'];
		Context::getInstance()->configurationService->getConfiguration()->contactMobile = $_POST['contactMobile'];
		
		// save configuration
		Context::getInstance()->configurationService->save();
		
		$_REQUEST['PAGE'] = "contacts";
		$_REQUEST['MESSAGE'] = "contacts.contactsChanged";
	}
	
}

?>
