<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 09.11.2016
 * Time: 11:26
 *
 * Klasse NavigationHelper
 *
 * steuert Erstellung der Seitennavigation
 * validiert Seitenaufruf
 *
 * Eigenschaften:
 * $home (private Variable) => Startseite
 * $frontendNav (public Array) => Hauptnavigation
 * $backendNav (public Array) => Backendnavigation
 * $subNav (public Array) => Unternavigation
 * $projectNav (public Array) => Unternavigation
 * $navArray (leeres public static Array)
 *
 * Methoden:
 * __construct()
 * createNavigation($login_status, $sub) => static
 * validateSiteParams($login_status, $get_param)
 *
 */

namespace classes\helpers;


class NavigationHelper
{
    private $home = "verein";
    public $frontendNav = array(
        "verein" => "Verein",
        "aktuelles" => "Aktuelles",
        "angebote" => "Angebote",
        "kontakt" => "Kontakt",
        "login" => "Login",
        "impressum" => "Impressum"
    );

    public $backendNav = array (
        "dokumente" => "Dokumentenverwaltung",
        "artikel" => "Atrikelverwaltung",
        "logout" => "Logout"
    );

    public $subNav = array (
        "vorstand" => "Vorstand",
        "mitglieder" => "Mitglieder",
        "ziele" => "Ziele"
    );

    public $projectNav = array (
        "projekt1" => "Projekt 1",
        "projekt2" => "Projekt 2",
        "projekt3" => "Projekt 3"
    );

    public static $navArray = [];

    public function __construct () {
        $this->globals = array_merge($_GET, $_POST);
        self::$navArray['frontend'] = $this->frontendNav;
        self::$navArray['backend'] = $this->backendNav;
        self::$navArray['subnavi'] = $this->subNav;
        self::$navArray['projects'] = $this->projectNav;
    }


    /**
     *
     * Erstellen der Navigation
     *
     * Einbindung der richtigen Seitennavigation abhängig vom Loginstatus (eingeloggt oder nicht)
     *
     * @param string $login_status Variable aus Sessionarray (nur wenn eingeloggt),
     * @param string $sub Bezeichnung der einzubindenen Navigation
     *
     */
    public static function createNavigation ($login_status, $sub) {
        if (isset ($login_status)) {
            $nav_file = "pages/inc/backendNavi.inc.php";
            if (file_exists($nav_file)) {
                include $nav_file;
            }
        } else {
            $nav_file = "pages/inc/" . $sub . ".inc.php";
            if (file_exists($nav_file)) {
                include $nav_file;
            }
        }
    }

    /**
     *
     * Validierung der GET-Parameter
     *
     * Validierung der Seitenparameter und Aufruf der Seite,
     * Einfügen des Seitennamens in die Navigation
     *
     * @param string $login_status Variable aus Sessionarray (nur wenn eingeloggt),
     * @param string $get_param aufgerufener GET-Parameter
     *
     */
    public function validateSiteParams ($login_status, $get_param) {
        if (isset ($get_param) && !empty ($get_param)) {
            if (isset ($login_status)) {
                if (array_key_exists ($get_param, $this->frontendNav) ||
                    array_key_exists ($get_param, $this->subNav) ||
                    array_key_exists ($get_param, $this->projectNav) ||
                    array_key_exists ($get_param, $this->backendNav)) {

                    return $get_param;
                } else {
                    return $this->home;
                }
            } else {
                if (array_key_exists ($get_param, $this->frontendNav) ||
                    array_key_exists ($get_param, $this->subNav) ||
                    array_key_exists ($get_param, $this->projectNav)) {

                    return $get_param;
                } else {
                    return $this->home;
                }
            }
        }

    }


}