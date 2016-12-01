<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 09.11.2016
 * Time: 11:20
 */

namespace classes\helpers;


class FormValidator
{

    public static $errorMessages = [];

    public static function validateFormfields ($inputData) {

        // wenn Submit-Button gedrückt wurde,
        // gehe durch $_POST['contact']:
        //
        // Schritt 1: prüfe jedes Feld, ob es leer ist
        //          => wenn ja, schreibe Fehlermeldung in $error
        // Schritt 2: prüfe einzelne Felder auf korrekte Einträge (reguläre Ausdrücke?)
        //
        // in jedem Schritt: wenn Validierung fehlschlägt, gib Fehlermeldung zurück
        // Schritt 3: Gibt es Fehlermeldungen? => ja >> gib sie aus
        //                                        nein >> gib TRUE zurück
        //
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
