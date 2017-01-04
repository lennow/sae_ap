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
     * liest Spalte mit Dateinamen aus
     * schreibt diese Liste in $allDocuments
     *
     * @return $allDocuments
     *
     */
    public function getUploadsFromDB () {

        $sql = "SELECT * FROM vereine_uploads";

        $allDocuments = $this->getDataFromDB($sql);
        return $allDocuments;

    }

    public function getDocumentFromDB ($document) {

        $sql = "SELECT * FROM vereine_uploads WHERE uploadName = :selected";

        $array = [
            ":selected" => $document['select']
        ];

        $allArticles = $this->getDataFromDB($sql, $array);
        return $allArticles;

    }

    /**
     * Speichern der hochgeladenen Dateinamen in DB
     *
     * fügt neuen Dateinamen hinzu
     *
     * @param $uploaded
     *
     */
    public function setUploadsToDB ($uploaded) {

        $sql = "INSERT INTO vereine_uploads (uploadName)
                VALUES (:filename)";

        $array = [
            ":filename" => $uploaded['name']
        ];

        $this->setDataToDB($sql, $array);
    }

    /**
     * Überschreiben der hochgeladenen Dateinamen in DB
     *
     * überschreibt bereits vorhandene Dateinamen
     *
     * @param $uploaded
     *
     */
    public function updateUploadsInDB ($uploaded) {

        $sql = "UPDATE vereine_uploads 
                SET uploadName = :uploaded";

        $array = [
            ":uploaded" => $uploaded['name']
        ];

        $this->setDataToDB($sql, $array);

    }

    /**
     * Löschen der hochgeladenen Dateinamen in DB
     *
     * löscht ausgewählten Dateinamen
     *
     * @param $uploaded
     *
     */
    public function deleteUploadsFromDB ($uploaded) {

        $sql = "DELETE FROM vereine_uploads WHERE uploadName = :uploaded";

        $array = [
            ":uploaded" => $uploaded['select']
        ];

        $this->setDataToDB($sql, $array);

    }

}

