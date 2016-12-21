<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 01.12.2016
 * Time: 11:19
 *
 * Klasse Model
 *
 * steuert Austausch mit Datenbank (DB)
 *
 * Eigenschaften:
 * $db (protected Variable)
 *
 * Methoden:
 * __construct()
 * getDataFromDB()
 * setDataToDB()
 *
 */

namespace classes\mvc_pagestructure;

use classes\traits\DB_Connection;


class Model
{

    protected $db;

    use DB_Connection;

    /**
     * Konstruktor
     *
     * initiiert Datenbankverbindung via Trait DB_Connection
     *
     */
    public function __construct() {
        $this->db = DB_Connection::connectDB();
    }

    /**
     * Daten aus DB holen
     *
     *  holt Daten aus der DB und gibt diese zurück
     *
     */
    public function getDataFromDB($sql, $array) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Daten in DB schreiben
     *
     *  schreibt Daten in die DB
     *
     */
    public function setDataToDB($sql, $array) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);
    }

}