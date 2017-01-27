<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 21.12.2016
 * Time: 11:17
 *
 */

namespace classes\traits;

/**
 * Trait DB_Connection.
 *
 * Initiates database connection
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\traits
 *
 */
trait DB_Connection
{

    /**
     * Method connectDB.
     *
     * tries to establish database connection,
     * throws error message if connection failed
     *
     * @return \PDO
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