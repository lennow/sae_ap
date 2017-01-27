<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 01.12.2016
 * Time: 11:19
 *
 */

namespace classes\mvc_pagestructure;

use classes\traits\DB_Connection;

/**
 * Class Model.
 *
 * Controls database connection
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_pagestructure
 *
 */
class Model
{

    /**
     * Object db.
     *
     * Instance of predefined class PDO
     *
     * @var \PDO
     *
     */
    protected $db;

    use DB_Connection;

    /**
     * Model constructor.
     *
     * Initiates database connection using method connectDB in trait DB_Connection
     *
     */
    public function __construct() {
        $this->db = $this->connectDB();
    }

    /**
     * Method getDataFromDB.
     *
     * Reads requested data in database and returns them
     *
     * @param $sql
     * @param null $array
     * @return array
     *
     */
    public function getDataFromDB($sql, $array = null) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Method setDataToDB.
     *
     * Writes new data to database
     *
     * @param $sql
     * @param null $array
     *
     */
    public function setDataToDB($sql, $array = null) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);
    }

}