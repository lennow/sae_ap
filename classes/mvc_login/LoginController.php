<?php
/**
* Created by PhpStorm.
* User: Lena
* Date: 21.12.2016
* Time: 11:19
*
*/

namespace classes\mvc_login;

use classes\helpers\FormValidator;
use classes\traits\Header;

/**
 * Class LoginController.
 *
 * Drives login form
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_login
 *
 */
class LoginController
{

    use Header;

    /**
     * Object loginModel.
     *
     * Instance of class LoginModel
     *
     * @var LoginModel
     *
     */
    private $loginModel;

    /**
     * LoginController constructor.
     *
     * Instantiates LoginModel
     *
     */
    public function __construct() {

        $this->loginModel = new LoginModel();

    }

    /**
     * Method checkLoginData.
     *
     * Validates login form data using static method validateFormfields in class FormValidator,
     * moves login data to $_SESSION array,
     * redirects user to backend (page "dokumente"),
     * returns error message if validation failed
     *
     * @param $loginData
     * @return array
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

}
