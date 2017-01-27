<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 29.12.2016
 * Time: 11:17
 *
 */

namespace classes\traits;

/**
 * Trait Header.
 *
 * Enables usage of different header types
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\traits
 *
 */
trait Header
{

    /**
     * Method redirect.
     *
     * Redirects user to defined location or page, respectively
     *
     * @param $location
     *
     */
    public function redirect ($location) {
        header('Location: ?p=' . $location);
        exit();
    }

    /**
     * Method download.
     *
     * Manages document download
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
     * Method refresh.
     *
     * Refreshes current page after 1 second automatically
     *
     * @param $page
     *
     */
    public function refresh ($page) {
        header('Refresh: 1; url=' . $_SERVER['PHP_SELF'] . '?p=' . $page);
        exit();
    }

}