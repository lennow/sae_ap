<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 11:19
 *
 * Klasse Main Controller
 *
 * steuert Anwendung grundlegend
 * Methoden:
 * __construct()
 * generatePagefiles()
 * runApplication()
 *
 */

namespace classes\controller;

use classes\helpers\NavigationHelper;
use classes\helpers\FormValidator;
use classes\helpers\FormMailer;
use classes\view\View;



class MainController {

    /**
     * Konstruktor
     *
     * startet Session
     * schreibt GET und POST Arrays in ein gemeinsames Array
     * instanziiert View und NavigationHelper
     *
     */
    public function __construct() {

        session_name("user");
        session_start();

        $this->globals = array_merge($_GET, $_POST);
        $this->view = new View();
        $this->navigation = new NavigationHelper();
    }



    /**
     * Erstellung der Seiten
     *
     * benutzt Klasse NavigationHelper
     * nimmt Navigationsarray aus NavigationHelper und legt im Ordner public/pages
     * die entsprechenden PHP-Dateien an
     *
     */
    public function generatePagefiles() {
        $sectors = array ('frontend', 'backend', 'subnavi', 'projects');
        foreach ($sectors as $area) {
            foreach (NavigationHelper::$navArray[$area] as $pagename => $pagetitle) {
                if (!file_exists (__PAGEDIR__ . $pagename . ".php")) {
                    fopen(__PAGEDIR__ . $pagename . ".php", "w+");
                }
            }
        }
    }



    /**
     * Anwendungssteuerung
     *
     * benutzt NavigationHelper
     * ruft Funktion validateSiteParams() auf und übergibt dieser eine Session-Variable (falls eingeloggter User)
     * und den aktuellen GET-Parameter
     *
     * ruft Funktion logout() auf (bei Ausloggen)
     *
     * switch/case für eigentliche Seitensteuerung
     * benutzt FormValidator für Formularauswertung
     * ruft auf Kontaktseite und im Backend entsprechende Routinen auf
     *
     * ruft Template (Frontend oder Backend) auf, (je nach Login-Status)
     *
     */
    public function run_application() {
        $this->page = $this->navigation->validateSiteParams (@$_SESSION['username'], @$this->globals['p']);
        //$this->logout();

        switch ($this->page) {
            case 'kontakt':
                $valid = FormValidator::validateFormfields(@$_POST['contact']);
                $this->view->errorStatus = FormValidator::$errorMessages;
                $mail = new FormMailer();
                $this->view->mailStatus = $mail->sendContactData($valid);
            break;

            case 'login':
                // ToDo: Steuerung Loginformular
                break;

            case 'dokumente':
                // ToDo: Steuerung Dokumentenverwaltung Backend
                break;

            case 'artikel':
                // ToDo: Steuerung Atrikelverwaltung Backend
                break;
        }

        /*
         * Template laden, Content laden
         */

        $this->view->setTemplate("frontend");
        $this->view->pageContent = $this->page . ".php";

        /*
         * Template laden, Content laden
        */

        try {
            return $this->view->loadTemplate();
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }

    }

}