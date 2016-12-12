<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 01.12.2016
 * Time: 11:28
 *
 * Klasse FormMailer
 *
 * versendet Informationen aus Kontaktformular per Email
 *
 * Methoden:
 * sendContactData()
 *
 */

namespace classes\helpers;

use classes\helpers\FormValidator;
use PHPMailer\PHPMailer\PHPMailer;


class FormMailer
{

    /**
     * benutzt Klasse PHP Mailer
     *
     * @param $contactData
     * @return string Erfolgsnachricht
     *
     */
    public function sendContactData ($contactData) {

        if ($contactData === true) {

            $mail = new PHPMailer();
            $mail->setFrom('info@verein.de', 'Verein');
            $mail->addAddress(@$_POST['contact']['Email']);             // Add a recipient
            //$mail->addReplyTo($_POST["Email"]);
            //$mail->isHTML(true);                          // Set email format to HTML
            $mail->Subject = "Nachricht von " . @$_POST['contact']['Name'] . "via Kontaktformular";
            $mail->Body    = @$_POST['contact']['Nachricht'];
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                echo 'Ihre Nachricht konnte nicht versendet werden.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                return 'Vielen Dank, Ihre Nachricht an uns wurde versandt.';
            }

        }

    }



}