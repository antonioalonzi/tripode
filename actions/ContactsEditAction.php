<?php

class ContactsEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		// change configuration
		Context::getInstance()->configurationService->getConfiguration()->contactName = $_REQUEST['contactName'];
		Context::getInstance()->configurationService->getConfiguration()->contactSurname = $_REQUEST['contactSurname'];
		Context::getInstance()->configurationService->getConfiguration()->contactAddress = $_REQUEST['contactAddress'];
		Context::getInstance()->configurationService->getConfiguration()->contactCity = $_REQUEST['contactCity'];
		Context::getInstance()->configurationService->getConfiguration()->contactPostcode = $_REQUEST['contactPostcode'];
		Context::getInstance()->configurationService->getConfiguration()->contactCountry = $_REQUEST['contactCountry'];
		Context::getInstance()->configurationService->getConfiguration()->contactTelephone = $_REQUEST['contactTelephone'];
		Context::getInstance()->configurationService->getConfiguration()->contactMobile = $_REQUEST['contactMobile'];
		
		// save configuration
		Context::getInstance()->configurationService->save();
		
		$_REQUEST['PAGE'] = "contacts";
		$_REQUEST['MESSAGE'] = "contacts.contactsChanged";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "contacts";
	}
}

?>
