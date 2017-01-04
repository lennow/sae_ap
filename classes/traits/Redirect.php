<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 29.12.2016
 * Time: 11:17
 *
 *
 * Interface Redirect
 *
 * Methoden:
 * redirect()
 *
 */

namespace classes\traits;


trait Redirect
{

    public function redirect ($location) {
        header('Location: ?p=' . $location);
        exit();
    }

    public function download ($content) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $content);
        readfile($content);
        exit();
    }

    public function refresh ($page) {
        header('Refresh: 1; url=' . $_SERVER['PHP_SELF'] . '?p=' . $page);
        exit();
    }

}