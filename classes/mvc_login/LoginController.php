<?php
/**
* Created by PhpStorm.
* User: Lena
* Date: 21.12.2016
* Time: 11:19
*
* Klasse LoginController
*
* steuert Login ins Backend
*
* Eigenschaften:
* $loginModel (leere private Variable)
* $valid (leere private Variable)
*
* Methoden:
* __construct()
* checkLoginData()
*
*/

namespace classes\mvc_login;

use classes\mvc_login\LoginModel;
use classes\helpers\FormValidator;
use classes\traits\Redirect;


class LoginController
{

    // ToDo: Steuerung Login => Formularvalidierung (Abgleich username & password -> LoginModel)
    // ToDo:                 => Weiterleitung auf Backend (Erfolg) / Fehlermeldung (Fail)

    private $loginModel;
    private $valid;

    use Redirect;

    /**
     * Konstruktor
     *
     * schreibt GET und POST Arrays in ein gemeinsames Array
     * instanziiert LoginModel
     * startet Methode validateFormFields im FormValidator und
     * prüft damit, ob beide Felder ausgefüllt wurden
     *
     */
    public function __construct() {

        $this->globals = array_merge($_GET, $_POST);
        $this->loginModel = new LoginModel();
        $this->valid = FormValidator::validateFormfields(@$_POST['login']);

    }


    /**
     * Prüfung der Einwahldaten
     *
     * schickt Einwahldaten an LoginModel und
     * prüft dort mit der Methode getLoginData(), ob
     * Einwahldaten mir Nutzerdaten in DB übereinstimmen
     *
     * schreibt Daten in $_SESSION (MD5-verschlüsselt),
     * wenn Daten aus DB zurückkommen
     *
     * @param $loginData
     *
     */
    public function checkLoginData ($loginData) {

        if ($this->valid) {
            $db_data = $this->loginModel->getLoginData($loginData);
            if (!empty ($db_data[0])) {
                $_SESSION['id'] = md5($db_data[0]['userID']);
                $_SESSION['username'] = md5($db_data[0]['userUsername']);
                $_SESSION['name'] = md5($db_data[0]['userName']);
                $_SESSION['lastname'] = md5($db_data[0]['userLastname']);
                $_SESSION['email'] = md5($db_data[0]['userEmail']);
                $_SESSION['satus'] = md5($db_data[0]['userStatus']);
                $this->redirect('dokumente');
            }
        }

    }

}
