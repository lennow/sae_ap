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

use classes\helpers\FormValidator;
use classes\traits\Redirect;


class LoginController
{

    use Redirect;

    private $loginModel;

    /**
     * Konstruktor
     *
     * instanziiert LoginModel
     *
     */
    public function __construct() {

        $this->loginModel = new LoginModel();

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
     * @return array (Fehlermeldungen aus Klasse FormValidator)
     *
     */
    public function checkLoginData ($loginData) {

        if (isset ($loginData['submit'])) {
            FormValidator::validateFormfields($loginData);
            if (empty (FormValidator::$errorMessages)) {
                $db_data = $this->loginModel->getLoginData($loginData);
                if (!empty ($db_data[0])) {
                    $_SESSION['id'] = $db_data[0]['userID'];
                    $_SESSION['username'] = $db_data[0]['userUsername'];
                    $_SESSION['name'] = $db_data[0]['userName'];
                    $_SESSION['lastname'] = $db_data[0]['userLastname'];
                    $_SESSION['email'] = $db_data[0]['userEmail'];
                    $_SESSION['satus'] = $db_data[0]['userStatus'];
                    $this->redirect('dokumente');
                }
            } else {
                return FormValidator::$errorMessages;
            }
        }

    }

    /*private function createNewUser ($name, $lastname, $email, $username, $password) {

        $user["Vorname"] = $name;
        $user["Nachname"] = $lastname;
        $user["Email"] = $email;
        $user["Benutzername"] = $username;
        $user["Passwort"] = $password;

        $this->loginModel->setUser($user);

    }*/

}
