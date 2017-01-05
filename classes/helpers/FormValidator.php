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
     * prüft im ersten Schritt, ob Submit Button Gedrückt wurde
     * prüft im zweiten Schritt, ob es sich um Login- oder Kontaktformular handelt
     * prüft im Login-Formular, ob Felder beide ausgefüllt wurden
     * prüft im Kontakt-Formular, ob Feld jeweils ausgefüllt wurde, checkt dann noch Email Adresse
     * gibt entweder Fehlermeldung zurück oder TRUE
     *
     * @param $inputData
     * @return bool
     *
     */
    public static function validateFormfields ($inputData) {

        if (isset ($inputData['username'])) {
            if(empty ($inputData['username']) || empty ($inputData['pass'])){
                self::$errorMessages['login'] = "Bitte füllen Sie beide Felder aus!";
            }
        } else {
            foreach ($inputData as $field => $value) {
                if(empty ($value)){
                    self::$errorMessages[$field] = "Bitte füllen Sie das Feld {$field} aus!";
                } else {
                    if ($field == "Email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        self::$errorMessages[$field] = "Bitte geben Sie eine korrekte E-Mail Adresse an!";
                    }
                }
            }
        }

    }

}
