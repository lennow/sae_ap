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

/**
 * Class NavigationHelper.
 *
 * creates all types of navigation used in the script
 *
 * @package classes\helpers
 *
 */
class NavigationHelper
{

    /**
     * @var string
     */
    private $home = "verein";

    /**
     * @var array
     */
    private $globals;

    /**
     * Array frontendNav.
     *
     * contains all pagenames used in main navigation
     *
     * @var array
     */
    public $frontendNav = array(
        "verein" => "Verein",
        "aktuelles" => "Aktuelles",
        "angebote" => "Angebote",
        "kontakt" => "Kontakt",
        "login" => "Login",
        "impressum" => "Impressum"
    );

    /**
     * Array backendNav.
     *
     * contains all pagenames used in backend navigation
     *
     * @var array
     */
    public $backendNav = array (
        "dokumente" => "Dokumentenverwaltung",
        "artikel" => "Artikelverwaltung",
        "logout" => "Logout"
    );

    /**
     * Array subNav.
     *
     * contains all pagenames used in secondary navigation
     *
     * @var array
     */
    public $subNav = array (
        "vorstand" => "Vorstand",
        "mitglieder" => "Mitglieder",
        "ziele" => "Ziele"
    );

    /**
     * Array projectNav.
     *
     * contains all pagenames used in other secondary navigation (on project pages)
     *
     * @var array
     */
    public $projectNav = array (
        "projekt1" => "Projekt 1",
        "projekt2" => "Projekt 2",
        "projekt3" => "Projekt 3"
    );

    /**
     * Static array navArray.
     *
     * empty by default
     *
     * @var array
     */
    public static $navArray = [];

    /**
     * NavigationHelper constructor.
     *
     * $_GET and $_POST are being merged in array $globals
     * all nav arrays are being merged in array $navArray
     *
     */
    public function __construct () {
        $this->globals = array_merge($_GET, $_POST);
        self::$navArray['frontend'] = $this->frontendNav;
        self::$navArray['backend'] = $this->backendNav;
        self::$navArray['subnavi'] = $this->subNav;
        self::$navArray['projects'] = $this->projectNav;
    }


    /**
     * Static Method createNavigation.
     *
     * login status is being checked to load either backend or frontend navigation
     * if secondary navigation required, it is included
     *
     * @param $login_status
     * @param $sub
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
     * Method validateSiteParams.
     *
     * login status is being checked
     * if $_GET['p'] can be found in any navigation array, it is returned to load site
     * if not found, $home is returned
     *
     * @param $login_status
     * @param $get_param
     * @return string
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