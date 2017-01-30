/*** Webdesign für den Verein ***/

Abschlussproduktion SAE Institute Leipzig
Kurs WDD 915, Webdesign & Development

konzipiert und erstellt von
Dr. Lena Lehmann

///////////////////////////////////////////////////////////////////////////////////////////////////

*** WICHTIG! ***
Bitte unbedingt Konzept einbeziehen!
Im Anhang des Konzeptes finden sich die Wireframes, welche als Vorlage für das hier angelegte Webdesign dienen!
Es gibt drei Versionen im CSS. Der Header bietet grundlegend zwei Varianten, in Variante 2 wird die Navigation
verschieden platziert.
Um das Layout anzupassen, sind folgende Änderungen zu machen:

1.) Dateipfad: public\css\style.scss
    => unter "HEADER", "MAIN NAVI", "MAIN + PAGES" und "FOOTER" entsprechende Layout-Version aktivieren
    (Zeilen 23, 27, 31 und 41).

2.) Dateipfad: public\pages\templates\frontend.php
    => unter "HEADER" entsprechenden Header aktivieren (Zeile 30 oder 31, siehe Kommentar darüber).
    => für Wireframes 3 & 4 zusätzlich noch folgende Zeilen einkommentieren: 41 - 43, 70 - 75
    => für Wireframe 4 außerdem Zeilen 99 - 116 einkommentieren

5.) Dateipfad: public\pages\templates\version_2\header.php
    => für Wireframe 2 Zeilen 28 und 32 einkommentieren
    => für Wireframes 3 & 4 diese Zeilen auskommentieren

6.) Dateipfad: public\css\designs\version_3\_main.scss
    => für Wireframe 3 folgende Zeilen einkommentieren: 7, 124 - 140
    => für Wireframe 4 diese Zeilen auskommentieren, dafür folgende Zeilen einkommentieren: 10, 143 - , 180 - 184

///////////////////////////////////////////////////////////////////////////////////////////////////

Die Hover-Effekte für die Navigationen können in folgender Datei ausgetauscht werden:

public\js\script.js

Zwei Effekte stehen zur Verfügung und können nach Bedarf ein-/auskommentiert werden:

    1. Änderung der Schriftfarbe der Navigationspunkte
    2. Änderung der Hintergrundfarbe der Navigationspunkte

///////////////////////////////////////////////////////////////////////////////////////////////////

LOGIN:

    Zugangsdaten zu Testzwecken:

    test / test

///////////////////////////////////////////////////////////////////////////////////////////////////

DATENBANK:

    SQL Datei liegt im Ordner db im root Verzeichnis.
    Die Zugangsdaten werden in folgender Datei angelegt:

    .\config\constants.php

///////////////////////////////////////////////////////////////////////////////////////////////////

DATEIUPLOAD:

Dateien werden in folgendem Ordner abgelegt:

.\public\uploads\files