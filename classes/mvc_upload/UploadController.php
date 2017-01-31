<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 09.11.2016
 * Time: 11:20
 *
 */

namespace classes\mvc_upload;

use classes\helpers\FormValidator;
use classes\traits\Header;

/**
 * Class UploadController.
 *
 * Upload pdf files to backend, save them to database,
 * download files and delete files
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_upload
 *
 */
class UploadController
{

    use Header;

    /**
     * Array all.
     *
     * Receives and stores all uploads from database
     *
     * @var array
     *
     */
    public $all;

    /**
     * @var string
     */
    public $page = "dokumente";

    /**
     * Object uploadModel
     *
     * Instance of class UploadModel
     *
     * @var UploadModel
     *
     */
    public $uploadModel;

    /**
     * UploadController constructor.
     *
     * Instantiates UploadModel,
     * reads all uploads from database
     *
     */
    public function __construct () {
        $this->uploadModel = new UploadModel();
        $this->all = $this->uploadModel->getUploadsFromDB();
    }

    /**
     * Method validateUploadedFile.
     *
     * Checks MIMEtype of file (pdf) and file size
     * (upload_max_filesize is set to 2 MB in php.ini, i.e. $_FILES['upload']['size'] is set to 0 if file exceeds 2 MB),
     * writes error messages in static array errorMessages in class FormValidator if validation failed
     *
     * @param $document
     *
     */
    public function validateFileExtension ($document) {

            $extWhitelist = array('pdf');
            $fileExtension = strtolower(pathinfo($document['name'], PATHINFO_EXTENSION));

            if (!in_array($fileExtension, $extWhitelist)) {
                FormValidator::$errorMessages['upload']['extension'] = "Diese Dateiendung ist nicht zulässig!";
            } elseif ($document['size'] == 0) {
                FormValidator::$errorMessages['upload']['size'] = "Die Datei ist zu groß. Die Dateigröße darf 2 MB nicht überschreiten.";
            }

    }

    /**
     * Method saveUploadedFiles.
     *
     * Calls validation of upload after file was submitted,
     * moves file to folder uploads if successful,
     * saves filename to database if successful,
     * refreshes page,
     *
     * pushes error message(s) to array errorMessages in class FormValidator if saving or validation failed
     *
     * @param $file
     *
     */
    public function saveUploadedFiles ($file) {

        if (isset ($file['submit'])) {
            $document = $_FILES['upload'];
            $this->validateFileExtension($document);

            if (!isset (FormValidator::$errorMessages['upload'])) {
                $name = $document['name'];
                if (!file_exists("uploads/files/" . $name)) {
                    move_uploaded_file($document['tmp_name'], "uploads/files/" . $name);
                    $this->uploadModel->setUploadsToDB($document);
                    $this->refresh($this->page);
                } else {
                    FormValidator::$errorMessages['upload']['file'] = "Eine Datei mit diesem Namen existiert bereits.";
                }
            } else {
                FormValidator::$errorMessages['upload']['fail'] = "Der Upload ist fehlgeschlagen.";
            }
        }

    }

    /**
     * Method downloadDocuments.
     *
     * Saves selected document to variable download using method getDocumentFromDB in class UploadModel,
     * initiates download of file using method download in trait Header
     *
     * @param $selected
     *
     */
    public function downloadDocuments ($selected) {

        if (isset ($selected['download'])) {
            $download = $this->uploadModel->getDocumentFromDB($selected['download']);
            $this->download($download);
        }

    }

    /**
     * Method deleteDocuments.
     *
     * Removes selected document from database
     *
     * @param $selected
     *
     */
    public function deleteDocuments ($selected) {

        if (isset ($selected['delete'])) {
            $this->uploadModel->deleteUploadsFromDB($selected);
            if (file_exists("uploads/files/" . $selected['select'])) {
                unlink("uploads/files/" . $selected['select']);
            }
            $this->refresh($this->page);
        }

    }

}