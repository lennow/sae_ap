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
 * logout()
 *
 */


namespace classes\traits;


trait Logout
{

    public function logout () {
        if (@$_GET['p'] == 'logout') {
            session_unset();
            session_destroy();
        }
    }
}