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
 * setUser()
 *
 */


namespace classes\mvc_login;

use classes\mvc_pagestructure\Model;


class LoginModel extends Model
{

    /**
     * Konstruktor
     *
     * führt Konstruktor von Model aus =>
     * initiiert Datenbankverbindung via Trait DB_Connection
     *
     */
    public function __construct() {
        parent::__construct();
    }


    /**
     * Daten aus Login mit DB abgleichen
     *
     * prüft, ob Einwahldaten in DB vorhanden
     *
     * @param $loginData
     * @return array (Nutzerdaten aus DB)
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



    /**
     * neuen Benutzer anlegen
     *
     * legt neue Zeile in DB mit neuen Nutzerdaten an
     *
     * @param $userData
     *
     */
    public function setUser ($userData) {
        $sql = "INSERT INTO vereine_users
                (userName, userLastname, userEmail, userUsername, userPassword)
                VALUES (:name, :lastname, :email, :username, :password)";

        $array = [
            ":name" => $userData["Vorname"],
            ":lastname" => $userData["Nachname"],
            ":email" => $userData["Email"],
            ":username" => $userData["Benutzername"],
            ":password" => $userData["Passwort"],
        ];

        $this->setDataToDB($sql, $array);
    }


}