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

/**
 * Class FormValidator.
 *
 * validates formfields of all forms
 *
 * @package classes\helpers
 *
 */
class FormValidator
{

    /**
     * Static property errorMessages.
     *
     * contains all error messages
     *
     * @var array
     */
    public static $errorMessages = [];


    /**
     * Static method validateFormfields.
     *
     * checks whether formfield is empty or not, validates eMail addresses
     * if errors detected, error messages are written in $errorMessages
     *
     * @param $inputData
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
