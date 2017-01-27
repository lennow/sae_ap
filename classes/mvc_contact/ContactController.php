<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 01.12.2016
 * Time: 11:28
 *
 */

namespace classes\mvc_contact;

use classes\helpers\FormMailer;
use classes\helpers\FormValidator;

/**
 * Class ContactController.
 *
 * Drives contact form
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_contact
 *
 */
class ContactController
{

    /**
     * Method run_contact.
     *
     * Validates contact form data using static method validateFormfields in class FormValidator,
     * sends information from contact form via eMail using static method sendContactData in class FormMailer,
     * returns status message after using this method (success or error message)
     *
     * @param $contactData
     * @return array|string
     *
     */
    public function run_contact($contactData) {

        if (isset ($contactData['submit'])) {
            FormValidator::validateFormfields($contactData);
            if (empty (FormValidator::$errorMessages)) {
                $contactMail = FormMailer::sendContactData($contactData);
                return $contactMail;
            } else {
                return FormValidator::$errorMessages;
            }
        }
    }


}