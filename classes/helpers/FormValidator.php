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

    public static function validateFormfields () {
        // Schritt 1: prüfe jedes Feld, ob es nicht leer ist
        // Schritt 2: prüfe einzelne Felder auf korrekte Einträge (reguläre Ausdrücke?)
        //
        // in jedem Schritt: wenn Validierung fehlschlägt, gib Fehlermeldung zurück
        // Schritt 3: Gibt es Fehlermeldungen? => ja >> gib sie aus
        //                                        nein >> gib TRUE zurück
        //
    }


}


// ToDo: class FormCreator => einzelne Funktionen für Erstellung jedes Elements, die im Template auch einzeln eingebunden werden
// ToDo:                   => Funktionen sind static!