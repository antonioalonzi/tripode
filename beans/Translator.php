<?php
class Translator {
	private $translations;
	public function __construct() {
		$this->translations = array (
				// horizontal menu
				'menu.home' => array (
						'en' => 'Home',
						'it' => 'Home',
						'es' => 'Home' 
				),
				'menu.login' => array (
						'en' => 'Login',
						'it' => 'Login',
						'es' => 'Login' 
				),
				'menu.logout' => array (
						'en' => 'Logout',
						'it' => 'Logout',
						'es' => 'Logout' 
				),
				'menu.contacts' => array (
						'en' => 'Contacts',
						'it' => 'Contatti',
						'es' => 'Contactos' 
				),
				
				// index
				'back_top' => array (
						'en' => 'Back to Top',
						'it' => 'Torna su',
						'es' => 'Volve arriba' 
				),
				
				// general actions
				'action.save' => array (
						'en' => 'Save',
						'it' => 'Salva',
						'es' => 'Guarda' 
				),
				'general.hide' => array (
						'en' => 'Hide',
						'it' => 'Nascondi',
						'es' => 'Oculta'
				),
				'general.show' => array (
						'en' => 'Show',
						'it' => 'Mostra',
						'es' => 'Mostra'
				),
				'general.actionUp' => array (
						'en' => 'Move up',
						'it' => 'Sposta su',
						'es' => 'Mueve arriba'
				),
				'general.actionDown' => array (
						'en' => 'Move down',
						'it' => 'Sposta giù',
						'es' => 'Mueve abajo'
				),
				'general.add' => array (
						'en' => 'Add',
						'it' => 'Aggiungi',
						'es' => 'Añada'
				),
				'general.ok' => array (
						'en' => 'OK',
						'it' => 'OK',
						'es' => 'OK'
				),
				'general.cancel' => array (
						'en' => 'Cancel',
						'it' => 'Cancella',
						'es' => 'Anula'
				),
				'general.delete' => array (
						'en' => 'Delete',
						'it' => 'Rimuove',
						'es' => 'Borra'
				),
				'general.rename' => array (
						'en' => 'Rename',
						'it' => 'Rinomina',
						'es' => 'Cambia nombre'
				),
				'general.confirmationMessage' => array (
						'en' => 'Are you sure?',
						'it' => 'Sei sicuro?',
						'es' => '¿Estás seguro?'
				),
				
				// general messages
				'error.permissionDenied' => array (
						'en' => 'You don\'t have sufficient permissions for executing this action.',
						'it' => 'Non hai permessi sufficienti per eseguire questa azione.',
						'es' => 'No tienes permisos suficientes para la ejecución de esta acción.' 
				),
				
				// languages
				'lang.english' => array (
						'en' => 'English',
						'it' => 'Inglese',
						'es' => 'Inglés'
				),
				'lang.italian' => array (
						'en' => 'Italian',
						'it' => 'Italiano',
						'es' => 'Italiano'
				),
				'lang.spanish' => array (
						'en' => 'Spanish',
						'it' => 'Spagnolo',
						'es' => 'Español'
				),
				
				// right-menu
				'gallery' => array (
						'en' => 'Gallery',
						'it' => 'Galleria',
						'es' => 'Galería'
				),
				'gallery.defaultIndexMessage' => array (
						'en' => 'Insert category description.',
						'it' => 'Inserisci la descrizione per la categoria.',
						'es' => 'Introduces la descripción de la categoría.'
				),
				'gallery.editCategories' => array (
						'en' => 'Manage your categories:',
						'it' => 'Gestisci le tue categorie:',
						'es' => 'Administras tus categorías:'
				),
				
				// login
				'login.email' => array (
						'en' => 'Email',
						'it' => 'Email',
						'es' => 'Email' 
				),
				'login.password' => array (
						'en' => 'Password',
						'it' => 'Password',
						'es' => 'Password' 
				),
				'login.enter' => array (
						'en' => 'Enter',
						'it' => 'Accedi',
						'es' => 'Entra' 
				),
				'login.loginError' => array (
						'en' => 'Email or password are incorrect.',
						'it' => 'Email o password incorretti.',
						'es' => 'Email o password incorrectos.' 
				),
				'login.loginSuccessful' => array (
						'en' => 'Login successful.',
						'it' => 'Login avvenuto con successo.',
						'es' => 'Inicio de sesión exitoso.' 
				),
				'login.adviceChangePassword' => array (
						'en' => 'You still have the default password, it is advised to change it now clicking on the \'edit\' icon.',
						'it' => 'Hai ancora la password di default, si consiglia di cambiarla adesso cliccando sull\'icona \'edit\'.',
						'es' => 'Tienes todavía la contraseña de default, se aconseja de cambiarla ahora haciendo clic en el icono \'edit \'.' 
				),
				'login.changeEmailAndPassword' => array (
						'en' => 'Change your email and password:',
						'it' => 'Cambia la tua email e password:',
						'es' => 'Cambia tus email y password:' 
				),
				'login.newPassword' => array (
						'en' => 'New Passowrd:',
						'it' => 'Nuova Password:',
						'es' => 'Nueva Password:' 
				),
				'login.confirmPassword' => array (
						'en' => 'Confirm password:',
						'it' => 'Ripeti password:',
						'es' => 'Repita password:' 
				),
				'login.passwordsDontMatch' => array (
						'en' => 'The passwords inserted do not match.',
						'it' => 'Le passwords inserite sono diverse.',
						'es' => 'Los passwords introducidas no coinciden.' 
				),
				'login.accountChanged' => array (
						'en' => 'Account successfully changed.',
						'it' => 'L\'account è stato cambiato con successo.',
						'es' => 'La cuenta ha sido cambiada correctamente.' 
				),
				
				// home
				'home.text' => array (
						'en' => 'Edit the content of the home page (it accepts html):',
						'it' => 'Modifica il contenuto della home page (accetta html):',
						'es' => 'Editar el contenido de la página principal (acepta html):' 
				),
				'home.message.homeModified' => array (
						'en' => 'Home successfully modified.',
						'it' => 'La Home è stata modificata con successo.',
						'es' => 'Home modificada corectamente.' 
				),
				
				// website
				'website.changeConfiguration' => array (
						'en' => 'Change the configuration for your website:',
						'it' => 'Cambia la configurazione per il tuo sito internet:',
						'es' => 'Cambia la configuración para tu sitio web:'
				),
				'website.name' => array (
						'en' => 'Name',
						'it' => 'Nome',
						'es' => 'Nombre'
				),
				'website.description' => array (
						'en' => 'Description',
						'it' => 'Descrizione',
						'es' => 'Descripción'
				),
				'website.author' => array (
						'en' => 'Author',
						'it' => 'Autore',
						'es' => 'Autor'
				),
				'website.lang' => array (
						'en' => 'Language',
						'it' => 'Lingua',
						'es' => 'Idioma'
				),
				'website.configurationChanged' => array (
						'en' => 'Configuration successfully updated.',
						'it' => 'La configurazione del sito è stata aggiornata con successo.',
						'es' => 'Tu configuración de sitio web ha sido actualizado correctamente.'
				),
				
				// contacts
				'contacts.name' => array (
						'en' => 'Name',
						'it' => 'Nome',
						'es' => 'Nombre'
				),
				'contacts.surname' => array (
						'en' => 'Surname',
						'it' => 'Cognome',
						'es' => 'Apellido'
				),
				'contacts.address' => array (
						'en' => 'Address',
						'it' => 'Indirizzo',
						'es' => 'Dirección'
				),
				'contacts.city' => array (
						'en' => 'Town',
						'it' => 'Città',
						'es' => 'Ciudad'
				),
				'contacts.postcode' => array (
						'en' => 'PostCode',
						'it' => 'CAP',
						'es' => 'Código postal'
				),
				'contacts.country' => array (
						'en' => 'Country',
						'it' => 'Stato',
						'es' => 'Nación'
				),
				'contacts.telephone' => array (
						'en' => 'Telephone',
						'it' => 'Telefono',
						'es' => 'Telefono'
				),
				'contacts.mobile' => array (
						'en' => 'Mobile',
						'it' => 'Cellulare',
						'es' => 'Móvil'
				),
				'contacts.changeContacts' => array (
						'en' => 'Change information for contacting you.',
						'it' => 'Cambia le informazioni per contattarti.',
						'es' => 'Cambie la información para ponerse en contacto con tigo.'
				),
				'contacts.contactsChanged' => array (
						'en' => 'Contact successfully updated.',
						'it' => 'Il tuo contatto è stato aggiornato con successo.',
						'es' => 'Tu contacto ha sido actualizado correctamente.'
				)
		);
	}
	public function translate($word, $lang = null) {
		if ($lang == null) {
			$lang = Context::getInstance ()->configurationManager->getConfiguration()->websiteLang;
		}
		$lang = strtolower(substr($lang, 0, 2));
		
		// return the key from the array if it is there
		if (array_key_exists ( $word, $this->translations )) {
			if (array_key_exists ( $lang, $this->translations [$word] )) {
				return $this->translations [$word] [$lang];
			} else {
				return $word;
			}
		} else {
			return $word;
		}
	}
}
?>
