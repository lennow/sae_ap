<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 10:31
 */

spl_autoload_register(function($class) {
    $filename = "../" . str_replace("\\", "/", $class) . ".php";
    if (file_exists($filename)) {
        require_once $filename;
        return true;
    }
});