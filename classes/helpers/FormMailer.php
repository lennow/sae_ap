<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 01.12.2016
 * Time: 11:28
 *
 */

namespace classes\helpers;

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class FormMailer.
 *
 * send information from contact form via eMail
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * PHPMailer:
 * @see https://github.com/PHPMailer/PHPMailer
 *
 * @package classes\helpers
 *
 */
class FormMailer
{
    /**
     * Static method sendContactData.
     *
     * collecting information from contact form and sending it via email
     *
     * @param $contactData array contains data from contact form
     * @return string successfully sent or not
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