<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 01.12.2016
 * Time: 11:28
 */

namespace classes\helpers;

use classes\helpers\FormValidator;
use PHPMailer\PHPMailer\PHPMailer;


class FormMailer
{

    public function sendContactData ($contactData) {

        if (FormValidator::validateFormfields($_POST['contact']) === true) {

            $mail = new PHPMailer();
            $mail->setFrom('info@verein.de', 'Verein');
            $mail->addAddress($contactData['Email']);     // Add a recipient
            //$mail->addReplyTo($data["Email"]);
            //$mail->isHTML(true);                          // Set email format to HTML
            $mail->Subject = "Nachricht von {$contactData['Name']} via Kontaktformular";
            $mail->Body    = $contactData['Nachricht'];
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