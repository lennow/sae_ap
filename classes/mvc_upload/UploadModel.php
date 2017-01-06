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
 * getDocumentFromDB()
 * setUploadsToDB()
 * updateUploadsInDB()
 * deleteUploadsFromDB()
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
     * alle Dokumente aus DB auslesen
     *
     * @return array (alle Dokumente aus DB)
     *
     */
    public function getUploadsFromDB () {

        $sql = "SELECT * FROM vereine_uploads";

        $allDocuments = $this->getDataFromDB($sql);
        return $allDocuments;

    }


    /**
     * einzelnes Dokument aus DB auslesen
     *
     * @param $document (ausgewähltes Dokument)
     * @return array (Dokumentdaten aus DB)
     *
     */
    public function getDocumentFromDB ($document) {

        $sql = "SELECT * FROM vereine_uploads WHERE uploadName = :selected";

        $array = [
            ":selected" => $document['select']
        ];

        $allArticles = $this->getDataFromDB($sql, $array);
        return $allArticles;

    }

    /**
     * neues Dokument in DB schreiben
     *
     * @param $uploaded (eingegebenes Dokument)
     *
     */
    public function setUploadsToDB ($uploaded) {

        $sql = "INSERT INTO vereine_uploads (uploadName)
                VALUES (:filename)";

        $array = [
            ":filename" => htmlspecialchars($uploaded['name'])
        ];

        $this->setDataToDB($sql, $array);
    }

    /**
     * Dokument in DB aktualisieren
     *
     * @param $uploaded (eingegebenes Dokument)
     *
     */
    public function updateUploadsInDB ($uploaded) {

        $sql = "UPDATE vereine_uploads 
                SET uploadName = :uploaded";

        $array = [
            ":uploaded" => htmlspecialchars($uploaded['name'])
        ];

        $this->setDataToDB($sql, $array);

    }

    /**
     * Dokument aus DB löschen
     *
     * @param $uploaded (ausgewähltes Dokument)
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

