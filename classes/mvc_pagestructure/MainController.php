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

// ToDo [Backend]:      ZUM SCHLUSS: Nutzerstatus Admin/Nutzer => für Admin Seite mit Formular, um neue Nutzer anzulegen!

/* ******************************************************* */

// ToDo [Fragen]:       Dokumentenverwaltung besser als select oder als Links?
// ToDo [Fragen]:       Gibt es Möglichkeit, Artikel direkt in Select-Liste zu laden, ohne neues Laden? AJAX?!
// ToDo [Fragen]:       Kann ich an select option irgendwie die ID des Artikels hängen?

/* ******************************************************* */



namespace classes\mvc_pagestructure;

use classes\helpers\NavigationHelper;
use classes\mvc_contact\ContactController;
use classes\mvc_upload\UploadController;
use classes\mvc_login\LoginController;
use classes\traits\Redirect;
use classes\traits\Logout;
use classes\mvc_articles\ArticleController;


class MainController {

    use Redirect;
    use Logout;

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

        switch ($this->page) {

            case 'kontakt':
                $this->view->contactForm = new ContactController();
            break;

            case 'login':
                $this->view->loginForm = new LoginController();
                break;

            case 'dokumente':
                $this->view->allDocuments = new UploadController();
                break;

            case 'aktuelles':
            case 'artikel':
            {
                $this->view->allArticles = new ArticleController();
                break;
            }

            case 'logout':
                $this->logout();
                $this->redirect('verein');
                break;

        }

        /*
         * Template laden, Content laden
         */
        if (isset ($_SESSION['username'])) {
            $this->view->setTemplate("backend");
            $this->view->pageContent = $this->page . ".php";
        } else {
            $this->view->setTemplate("frontend");
            $this->view->pageContent = $this->page . ".php";
        }

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