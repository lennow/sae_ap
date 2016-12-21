<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 09.11.2016
 * Time: 15:57
 *
 * Klasse View
 *
 * steuert Ansicht der Website
 *
 * Eigenschaften:
 * $template (public Variable)
 * $content (public Variable)
 *
 * Methoden:
 * __set($key, $value)
 * __get($key)
 * setTemplate($template_name)
 * loadTemplate()
 *
 */

namespace classes\mvc_pagestructure;


class View
{
    private $template;
    private $content;

    /**
     * SET
     *
     * schreibt $key & $value in array $content
     *
     * @param $key
     * @param $value
     *
     */
    public function __set($key, $value) {
        $this->content[$key] = $value;
    }


    /**
     * GET
     *
     * liest Daten aus $content aus, wenn welche drin (sonst new Exception mit Fehlermeldung)
     *
     * @param $key
     * @return mixed
     * @throws \Exception
     *
     */
    public function __get($key) {
        if (isset ($this->content)) {
            return $this->content[$key];
        } else {
            throw new \Exception ("Ihre Anfrage kann nicht bearbeitet werden.");
        }
    }


    /**
     * Vorbereitung des richtigen Templates
     *
     * @param $template_name
     *
     */
    public function setTemplate($template_name) {
        $this->template = $template_name;
    }


    /**
     * Laden des richtigen Templates
     *
     * @return string $output Name des Templates
     * @throws \Exception
     *
     */
    public function loadTemplate() {
        $output = "";
        $file = __PAGEDIR__ . "templates/" . $this->template . ".php";

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