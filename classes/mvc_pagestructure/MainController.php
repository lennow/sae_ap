<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 11:19
 *
 */

namespace classes\mvc_pagestructure;

use classes\helpers\NavigationHelper;
use classes\mvc_contact\ContactController;
use classes\mvc_upload\UploadController;
use classes\mvc_login\LoginController;
use classes\traits\Header;
use classes\traits\Logout;
use classes\mvc_articles\ArticleController;

/**
 * Class MainController.
 *
 * Runs application in its entirety
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_pagestructure
 *
 */
class MainController {

    use Header;
    use Logout;

    /**
     * Object view.
     *
     * Instance of class View
     *
     * @var View
     *
     */
    public $view;

    /**
     * Object navigation.
     *
     * Instance of class NavigationHelper
     *
     * @var NavigationHelper
     *
     */
    public $navigation;

    /**
     * MainController constructor.
     *
     * Starts Session with session name "user",
     * instantiates View,
     * instantiates NavigationHelper
     *
     */
    public function __construct() {

        session_name("user");
        session_start();

        $this->view = new View();
        $this->navigation = new NavigationHelper();
    }

    /**
     * Method generatePagefiles.
     *
     * Generates files out of all navigation arrays in class NavigationHelper,
     * files stored in public\pages
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
     * Method run_application.
     *
     * Main method,
     * instantiates subcontrollers depending on current page,
     * controls logout,
     * loads template files for frontend or backend (depending on login status)
     *
     * @return string
     *
     */
    public function run_application() {
        $page = $this->navigation->validateSiteParams (@$_SESSION['username'], @$_GET['p']);

        switch ($page) {

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

        if (isset ($_SESSION['username'])) {
            $this->view->setTemplate("backend");
            $this->view->pageContent = $page . ".php";
        } else {
            $this->view->setTemplate("frontend");
            $this->view->pageContent = $page . ".php";
        }

        try {
            return $this->view->loadTemplate();
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }

    }

}