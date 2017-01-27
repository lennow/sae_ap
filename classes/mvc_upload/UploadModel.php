<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 29.12.2016
 * Time: 11:19
 *
 */

namespace classes\mvc_upload;

use classes\mvc_pagestructure\Model;

/**
 * Class UploadModel.
 *
 * Gets all or single documents from database,
 * inserts new uploads to database,
 * removes documents from database
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_upload
 *
 */
class UploadModel extends Model
{

    /**
     * @var array
     */
    public $filename = [];

    /**
     * UploadModel constructor.
     *
     * Instantiates parent constructor (in class Model),
     * initiates database connection via trait DB_Connection
     *
     */
    public function __construct() {
        parent::__construct();
    }


    /**
     * Method getUploadsFromDB.
     *
     * Selects and returns all documents from database
     *
     * @return array
     *
     */
    public function getUploadsFromDB () {

        $sql = "SELECT * FROM vereine_uploads";

        $allDocuments = $this->getDataFromDB($sql);
        return $allDocuments;

    }

    /**
     * Method getDocumentFromDB.
     *
     * Selects and returns requested document from database
     *
     * @param $document
     * @return array
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
     * Method setUploadsToDB.
     *
     * Inserts new uploaded documents into database
     *
     * @param $uploaded
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
     * Method deleteUploadsFromDB.
     *
     * Removes selected document from database
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

