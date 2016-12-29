<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 29.12.2016
 * Time: 11:19
 *
 * Klasse UploadModel
 *
 * archiviert Uploads in DB
 * und gibt sie wieder aus
 *
 * Methoden:
 * __construct()
 * getUploadsFromDB()
 * setUploadsToDB()
 *
 */

namespace classes\mvc_upload;

use classes\mvc_pagestructure\Model;


class UploadModel extends Model
{

    public $filename = [];

    /**
     * Konstruktor
     *
     * führt Konstruktor von Model aus =>
     * initiiert Datenbankverbindung via Trait DB_Connection
     *
     */
    public function __construct() {
        parent::__construct();
    }


    /**
     * Liste der Uploads aus DB auslesen
     *
     * liest Spalte mit Dateinamen aus (sofern Werte vorhanden)
     * schreibt diese Liste in $filename
     *
     * @return $filename
     *
     */
    public function getUploadsFromDB () {

        $sql = "SELECT * FROM vereine_uploads";

        return $this->getDataFromDB($sql);

    }

// ToDo: Prüfung der vorhandenen Daten und Überschreiben funzt noch nicht!
// ToDo: Bei jeder Aktualisierung der Seite im Browser wird Datei neu in DB geschrieben und in Liste ausgegeben.

    /**
     * speichern der hochgeladenen Dateinamen in DB
     *
     * prüft, ob Name der hochgeladenen Datei bereits in DB steht
     *
     * überschreibt bereits vorhandene Dateinamen bzw.
     * fügt neuen Dateinamen hinzu
     *
     * @param $uploadedData
     *
     */
    public function setUploadsToDB ($uploadedData) {

        $sql = "INSERT INTO vereine_uploads 
                (uploadName)
                VALUES (:filename)";

        $array = [
            ":filename" => $uploadedData['name']
        ];

        $this->setDataToDB($sql, $array);
    }

}

