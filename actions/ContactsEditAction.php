<?php

class ContactsEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		// change configuration
		Context::getInstance()->configurationManager->getConfiguration()->contactName = $_REQUEST['contactName'];
		Context::getInstance()->configurationManager->getConfiguration()->contactSurname = $_REQUEST['contactSurname'];
		Context::getInstance()->configurationManager->getConfiguration()->contactAddress = $_REQUEST['contactAddress'];
		Context::getInstance()->configurationManager->getConfiguration()->contactCity = $_REQUEST['contactCity'];
		Context::getInstance()->configurationManager->getConfiguration()->contactPostcode = $_REQUEST['contactPostcode'];
		Context::getInstance()->configurationManager->getConfiguration()->contactCountry = $_REQUEST['contactCountry'];
		Context::getInstance()->configurationManager->getConfiguration()->contactTelephone = $_REQUEST['contactTelephone'];
		Context::getInstance()->configurationManager->getConfiguration()->contactMobile = $_REQUEST['contactMobile'];
		
		// save configuration
		Context::getInstance()->configurationManager->save();
		
		$_REQUEST['PAGE'] = "contacts";
		$_REQUEST['MESSAGE'] = "contacts.contactsChanged";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "contacts";
	}
}

?>
