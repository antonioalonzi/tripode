<?php
require_once("model/Context.php");

class TranslationServiceTest extends PHPUnit_Framework_TestCase {

	public function testTranslateContactsUsingItalianIfPassedIntoTheTranslateMethod() {
		// Given
		$keyToTranslate = "menu.contacts";
		$lang = "it";
		Context::getInstance()->configurationService->getConfiguration()->websiteLang = "en";
		
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate, $lang);
		
		// Assert
		$this->assertEquals("Contatti", $translation);
	}
	
	public function testTranslateContactsUsingLanguageFromConfiguration() {
		// Given
		$keyToTranslate = "menu.contacts";
		Context::getInstance()->configurationService->getConfiguration()->websiteLang = "en";
		
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate);
		
		// Assert
		$this->assertEquals("Contacts", $translation);
	}
	
	public function testTranslateContactsTheLanguagePassedIsCaseInsensitive() {
		// Given
		$keyToTranslate = "menu.contacts";
		$lang = "IT";
		
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate, $lang);
		
		// Assert
		$this->assertEquals("Contatti", $translation);
	}
	
	public function testTranslateContactsUsesOnlyTheFirstTwoLettersOfTheLanguageToMatch() {
		// Given
		$keyToTranslate = "menu.contacts";
		$lang = "italian";
		
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate, $lang);
		
		// Assert
		$this->assertEquals("Contatti", $translation);
	}
	
	public function testTranslateContactsReturnsTheKeyIfTheLanguageDoesNotExists() {
		// Given
		$keyToTranslate = "menu.contacts";
		$lang = "nd";
		
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate, $lang);
		
		// Assert
		$this->assertEquals("menu.contacts", $translation);
	}
	
	public function testTranslateContactsReturnsTheKeyIfItDoesNotExists() {
		// Given
		$keyToTranslate = "key.not.existing";
		$lang = "it";
		
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate, $lang);
		
		// Assert
		$this->assertEquals("key.not.existing", $translation);
	}
	
	public function testTranslateContactsReturnsTheKeyIfLanguageNotSpecified() {
		// Given
		$keyToTranslate = "key.not.existing";
		Context::getInstance()->configurationService->getConfiguration()->websiteLang = null;
	
		// when
		$translation = Context::getInstance()->translationService->translate($keyToTranslate);
	
		// Assert
		$this->assertEquals("key.not.existing", $translation);
	}
}
?>