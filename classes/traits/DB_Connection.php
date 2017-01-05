<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 21.12.2016
 * Time: 11:17
 *
 *
 * Trait DB_Connection
 *
 * Methoden:
 * connectDB()
 *
 */

namespace classes\traits;


trait DB_Connection
{

    /**
     * Verbindung zur Datenbank
     *
     * etabliert Verbindung zur Datenbank
     *
     */
    public function connectDB () {
        try {
            return new \PDO(
                'mysql:host=' . __HOST__ .
                '; dbname=' . __DBNAME__ . ''
                , __DBUSER__
                , __DBPASS__,
                array(
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ));
        } catch (\Exception $e) {
            echo $e -> getMessage();
        }
    }

}