<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 10:29
 *
 * Startdatei
 * ruft Autoloader auf
 * instanziiert Controller
 * ruft Methode generatePagefiles() auf
 * ruft Methode run_application() auf
 *
 */

require_once "autoload.php";
require_once "../vendor/autoload.php";
require_once "../config/constants.php";

use classes\controller\MainController;

$controller = new MainController();
$controller->generatePagefiles();
echo $controller->run_application();