<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 11:19
 */

namespace classes\controller;

use classes\helpers\NavigationHelper;
use classes\helpers\FormValidator;
use classes\helpers\FormMailer;
use classes\view\View;

class MainController {

    // ToDo: Array für Seiten; Seiten erstellen (automatisch); Navigation erstellen

    public function __construct() {

        session_name("user");
        session_start();

        $this->globals = array_merge($_GET, $_POST);
        $this->view = new View();
        $this->navigation = new NavigationHelper();
    }

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

    public function run_application() {
        $this->page = $this->navigation->validateSiteParams (@$_SESSION['username'], @$this->globals['p']);
        //$this->logout();

        /*
         * switch/case für Seitensteuerung
         */

        switch ($this->page) {
            case 'kontakt':
                // ToDo: Steuerung Kontaktformular
                // wenn absenden gedrückt, Formularvalidierung starten
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