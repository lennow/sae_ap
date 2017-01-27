<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 21.12.2016
 * Time: 11:19
 *
 * Klasse LoginModel
 *
 * steuert Login ins Backend
 * gleicht eingegebene Nutzerdaten mit denen in DB ab
 * legt neue Nutzer an
 *
 * Methoden:
 * __construct()
 * getLoginData()
 *
 */

namespace classes\mvc_login;

use classes\mvc_pagestructure\Model;

/**
 * Class LoginModel.
 *
 * Reads and compares user data from database with login data
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_login
 *
 */
class LoginModel extends Model
{

    /**
     * LoginModel constructor.
     *
     * Instantiates parent constructor (in class Model),
     * initiates database connection via trait DB_Connection
     *
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Method getLoginData.
     *
     * Selects userdata from database comparing them to submitted login data
     *
     * @param $loginData
     * @return array
     *
     */
    public function getLoginData ($loginData) {
        $sql = "SELECT * FROM vereine_users 
                WHERE userUsername = :username
                AND userPassword = :password";

        $array = [
            ":username" => $loginData['username'],
            ":password" => $loginData['pass']
        ];

        $login = $this->getDataFromDB($sql, $array);
        return $login;
    }

}