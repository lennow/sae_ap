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
        header("Location: ?p=" . $location);
        exit();
    }
}