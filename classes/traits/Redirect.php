<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 29.12.2016
 * Time: 11:17
 *
 *
 * Trait Redirect
 *
 * Methoden:
 * redirect()
 * download()
 * refresh()
 *
 */

namespace classes\traits;


trait Redirect
{

    /**
     * Weiterleitung auf Seite
     *
     * @param $location
     *
     */
    public function redirect ($location) {
        header('Location: ?p=' . $location);
        exit();
    }


    /**
     * Download von Dateien
     *
     * @param $content
     *
     */
    public function download ($content) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $content);
        readfile($content);
        exit();
    }


    /**
     * Automatisches neu Laden der Seite
     *
     * @param $page
     *
     */
    public function refresh ($page) {
        header('Refresh: 1; url=' . $_SERVER['PHP_SELF'] . '?p=' . $page);
        exit();
    }

}