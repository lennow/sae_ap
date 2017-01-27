<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 29.12.2016
 * Time: 11:17
 *
 */


namespace classes\traits;

/**
 * Trait Logout.
 *
 * Manages logout from backend
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\traits
 *
 */
trait Logout
{

    /**
     * Method logout.
     *
     * Unsets and destroys current session
     *
     */
    public function logout () {
        if (@$_GET['p'] == 'logout') {
            session_unset();
            session_destroy();
        }
    }
}