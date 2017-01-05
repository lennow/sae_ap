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
 * PHPMailer: https://github.com/PHPMailer/PHPMailer
 *
 */

namespace classes\helpers;

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
    public static function sendContactData ($contactData) {

        $mail = new PHPMailer();
        $mail->setFrom(@$contactData['Email']);
        $mail->addAddress('info@verein.de', 'Verein');              // Add a recipient
        $mail->Subject = "Nachricht von " . @$contactData['Name'] . "via Kontaktformular";
        $mail->Body    = @$contactData['Nachricht'];

        if(!$mail->send()) {
            $fail = 'Ihre Nachricht konnte nicht versendet werden.<br />';
            $fail .= 'Mailer Error: ' . $mail->ErrorInfo;
            return $fail;
        } else {
            $success = 'Vielen Dank, Ihre Nachricht an uns wurde versandt.';
            return $success;
        }

    }

}