<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 01.12.2016
 * Time: 11:28
 *
 * Klasse ContactController
 *
 * steuert Kontaktformular
 *
 * Methoden:
 * run_contact()
 *
 */

namespace classes\mvc_contact;


use classes\helpers\FormMailer;
use classes\helpers\FormValidator;

class ContactController
{

    /**
     * Steuerung Kontaktformular
     *
     * prüft, ob jedes Feld einen Eintrag hat
     * => wenn ja, wird Klasse FormMailer aktiviert und
     * Nachricht als Mail an Verein versendet (Statusnachricht wird ausgegeben)
     * => wenn nicht, werden Fehlermeldungen ausgegeben
     *
     * @param $contactData
     * @return string (Status Mailversand) ODER array (Fehlermeldungen aus Klasse FormValidator)
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