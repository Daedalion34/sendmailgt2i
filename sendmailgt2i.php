<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Sendmailgt2i extends Module{
	/* @var boolean error */
	protected $error = false;

	public function __construct(){
	 	$this->name = 'sendmailgt2i';
	 	$this->tab = 'Module Send Mail';
	 	$this->version = '0.1';
		$this->author = 'Morales';
		$this->need_instance = 1;
		$this->bootstrap = true;

	 	parent::__construct();

    $this->displayName = $this->l('Sendmailgt2i');
    $this->description = $this->l('Sendmailgt2i Description');
		$this->confirmUninstall = $this->l('Are you sure you want to delete sendmailgt2i ?');
	}

	public function install(){
	 	if (!parent::install() OR !$this->registerHook('top'))
	 		return false;
	 	return true;
	}

	public function uninstall(){
	 	if (!parent::uninstall())
	 		return false;
	 	return true;
	}

	public function hookTop($params){
	 	global $cookie, $smarty;
		$smarty->assign(array());
		return $this->display(__FILE__, 'sendmailgt2i.tpl');
	}
  public function hookPafofHook($params){}

	public function getContent(){
    global $cookie;

		$this->_html = '<h2>'.$this->displayName.'</h2>';
		$this->_displayForm();
    $sql = Db::getInstance()->getValue('
    SELECT quantity
    FROM ps_stock_available
    WHERE id_product = 20');
    var_dump($return);

		$subject = 'Bonjour';
		$donnees = array('{nom}'  => 'Jobs' , '{prenom}'  => 'Steve', '{result}'  => $sql );
		$destinataire = 'morales.maximilien@gmail.com';

		$send = Mail::Send(intval($cookie->id_lang), 'montemplate', $subject , $donnees, $destinataire, NULL, NULL, NULL, NULL, NULL, 'mails/');

		if ($send)
		echo 'Done';
		else
		echo 'Error';
  }

  private function _displayForm(){
    global $cookie;
    /* Language */
    $defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
    $languages = Language::getLanguages(false);
    $divLangName = 'text¤title';

    $this->_html .= '';
  }
}




	// protected function sendConfirmationEmail($email)
	// {
	// 		$language = new Language($this->context->language->id);
	// 		return Mail::Send(
	// 				$this->context->language->id,
	// 				'newsletter_conf',
	// 				$this->trans(
	// 						'Newsletter confirmation',
	// 						array(),
	// 						'Emails.Subject',
	// 						$language->locale
	// 				),
	// 				array(),
	// 				pSQL($email),
	// 				null,
	// 				null,
	// 				null,
	// 				null,
	// 				null,
	// 				dirname(__FILE__).'/mails/',
	// 				false,
	// 				$this->context->shop->id
	// 		);
	// }


  // Mail::Send(intval($cookie->id_lang), 'montemplate', $sujet , $donnees, $destinataire, NULL, NULL, NULL, NULL, NULL, 'mails/');


	// $email = 'morales.maximilien@gmail.com';
	// $this->sendConfirmationEmail($email);

// $message = "Line 1\r\nLine 2\r\nLine 3";
//
// // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
// $message = wordwrap($message, 70, "\r\n");
//
// // Envoi du mail
// mail('morales.maximilien@gmail.com', 'Mon Sujet', $message);

	// return $return;

	// public static function getTEST(){
	// 	$result = Db::getInstance()->Execute('
	// 	SELECT *
	// 	FROM `'._DB_PREFIX_.'ps_stock_available`
	// 	WHERE `id_product` = 20');
	// 	$result = mysql_fetch_array($result);
	// 	echo 'Result for id : '.$result['id'];
	// 	var_dump($result);
	// }


	//

	//
	// $result = Db::getInstance()->getValue('
	// 	SELECT quantity
	// 	FROM `'._DB_PREFIX_.'ps_stock_available`
	// 	WHERE `id_product` = 20');
	// 	// echo 'Result for id 1 : '.$result;
	// 	$this->_html = '<h2>'.$this->displayName.'</h2>'.'je suis la'.$result;
	// 	$this->_displayForm();
	// 	var_dump($return);
	// 	return $return;







	// public function getContent(){
	// 	if (isset($_POST['submit'])){
	// 		if (!empty($_POST['lastname']) AND !empty($_POST['firstname']))
	// 			echo '<h1>Bonjour '.$_POST['firstname'].' '.$_POST['lastname'].'</h1>';
	// 		else
	// 			echo '<span class="warning" style="display: block;">Erreur : Veuillez entrer votre nom et prenom</span>';
	// 	}
	// 	echo '<fieldset>
	// 		<legend> Administration du module : </legend>
	// 		<form method="post">Nom :
	// 			<input name="lastname" type="text" />Prenom :
	// 			<input name="firstname" type="text" />
	// 			<input name="submit" type="submit" value="Envoyer" />
	// 		</form>
	// 		</fieldset>';
	// }
