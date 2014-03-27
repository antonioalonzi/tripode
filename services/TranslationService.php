<?php
class TranslationService {

	private $translations;

	public function __construct(){
		$this->translations = array(
			// horizontal menu
			'menu.home'  => array(
				'en' => 'Home',
				'it' => 'Home',
				'es' => 'Home'
			),
			'menu.login' => array(
				'en' => 'Login',
				'it' => 'Login',
				'es' => 'Login'
			),
			'menu.logout' => array(
				'en' => 'Logout',
				'it' => 'Logout',
				'es' => 'Logout'
			),
			'menu.contacts' => array(
				'en' => 'Contacts',
				'it' => 'Contatti',
				'es' => 'Contactos'
			),
			
			// index
			'back_top' => array(
				'en' => 'Back to Top',
				'it' => 'Torna su',
				'es' => 'Volve arriba'
			),
			
			// contacts
			'contacts.address' => array(
				'en' => 'Address',
				'it' => 'Indirizzo',
				'es' => 'Dirección'
			),
			'contacts.telephone' => array(
				'en' => 'Telephone',
				'it' => 'Telefono',
				'es' => 'Telefono'
			),
			'contacts.mobile' => array(
				'en' => 'Mobile',
				'it' => 'Cellulare',
				'es' => 'Móvil'
			),
			
			// right-menu
			'gallery' => array(
				'en' => 'Gallery',
				'it' => 'Galleria',
				'es' => 'Galería'
			),
			
			// general actions
			'action.save' => array(
				'en' => 'Save',
				'it' => 'Salva',
				'es' => 'Guarda'
			),
			
			// general messages
			'error.permissionDenied' => array(
				'en' => 'You don\'t have sufficient permissions for executing this action.',
				'it' => 'Non hai permessi sufficienti per eseguire questa azione.',
				'es' => 'No tienes permisos suficientes para la ejecución de esta acción.'
			),
			
			// login
			'login.email' => array(
				'en' => 'Email',
				'it' => 'Email',
				'es' => 'Email'
			),
			'login.password' => array(
				'en' => 'Password',
				'it' => 'Password',
				'es' => 'Password'
			),
			'login.enter' => array(
				'en' => 'Enter',
				'it' => 'Accedi',
				'es' => 'Entra'
			),
			'login.loginError' => array(
				'en' => 'Email or password are incorrect.',
				'it' => 'Email o password incorretti.',
				'es' => 'Email o password incorrectos.'
			),
			'login.loginSuccessful' => array(
				'en' => 'Login successful.',
				'it' => 'Login avvenuto con successo.',
				'es' => 'Inicio de sesión exitoso.'
			),
			
			// home
			'home.text' => array(
				'en' => 'Edit the content of the home page (it accepts html):',
				'it' => 'Modifica il contenuto della home page (accetta html):',
				'es' => 'Editar el contenido de la página principal (acepta html):'
			),
			'home.message.homeModified' => array(
				'en' => 'Home successfully modified.',
				'it' => 'La Home è stata modificata con successo.',
				'es' => 'Home modificada corectamente.'
			)
		);
	}

	public function translate($word, $lang = null){
		if ($lang == null) {
			$lang = substr(Context::getInstance()->configuration->lang, 0, 2);
		}
		
		// return the key from the array if it is there
		if (array_key_exists($word, $this->translations)) {
			if (array_key_exists($lang, $this->translations[$word])) {
				return $this->translations[$word][$lang];
			} else {
				return $word;
			}
		} else {
			return $word;
		}
	}
}
?>
