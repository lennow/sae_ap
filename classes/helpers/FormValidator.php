<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 09.11.2016
 * Time: 11:20
 *
 * Klasse FormValidator
 *
 * hilft bei der Validierung von Formulardaten
 *
 * Eigenschaften:
 * $errorMessages (leeres public static Array)
 *
 * Methoden:
 * validateFormfields() => static
 *
 */

namespace classes\helpers;


class FormValidator
{

    public static $errorMessages = [];


    /**
     * Validierung der Formulareingabedaten
     *
     * prüft im ersten Schritt, ob Feld ausgefüllt wurde
     * prüft im zweiten Schritt, ob Fels korrekt ausgefüllt wurde (z.B. Email Adresse)
     * gibt entweder Fehlermeldung zurück oder TRUE
     *
     * @param $inputData
     * @return bool
     *
     */
    public static function validateFormfields ($inputData) {

        if (isset ($inputData['submit'])) {
            foreach ($inputData as $field => $value) {
                if($value == ""){
                    self::$errorMessages[$field] = "Bitte füllen Sie das Feld {$field} aus!";
                } else {
                    if ($field == "Email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        self::$errorMessages[$field] = "Bitte geben Sie eine korrekte E-Mail Adresse an!";
                    }
                }
            }
            if (empty (self::$errorMessages)) {
                return true;
            }
        }
    }

}
