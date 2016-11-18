<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 09.11.2016
 * Time: 15:57
 */

namespace classes\view;


class View
{
    private $template;
    private $content;

    /*
     * Funktion __set() => schreibt $key & $value in array $content
     */

    public function __set($key, $value) {
        $this->content[$key] = $value;
    }

    /*
     * Funktion __get() => liest Daten aus $content aus, wenn welche drin (sonst new Exception mit Fehlermeldung)
     */

    public function __get($key) {
        if (isset ($this->content)) {
            return $this->content[$key];
        } else {
            throw new \Exception ("Ihre Anfrage kann nicht bearbeitet werden.");
        }
    }

    /*
     * Funktion setTemplate() schreibt Template-Namen in $template
     */

    public function setTemplate($template_name) {
        $this->template = $template_name;
    }

    /*
     * Funktion loadTemplate() => ruft Template auf
     */

    public function loadTemplate() {
        $output = "";
        $file = "pages/templates/" . $this->template . ".php";

        if (file_exists ($file)) {
            ob_start();
            include $file;
            $output = ob_get_contents();
            ob_end_clean();
        } else {
            throw new \Exception("Die Seite kann nicht geladen werden.");
        }

        return $output;
    }




}