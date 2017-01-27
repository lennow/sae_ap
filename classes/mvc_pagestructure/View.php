<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 09.11.2016
 * Time: 15:57
 *
 */

namespace classes\mvc_pagestructure;

/**
 * Class View.
 *
 * Manages output to viewport
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_pagestructure
 *
 */
class View
{

    private $template;

    /**
     * @var array
     */
    private $content;

    /**
     * Magic Method set.
     *
     * Writing some content into content array
     *
     * @param $key
     * @param $value
     *
     */
    public function __set($key, $value) {
        $this->content[$key] = $value;
    }

    /**
     * Magic method get.
     *
     * Reads data from content array,
     * throws error message if there are no data stored in array
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
     * Method setTemplate.
     *
     * Prepares template file depending on login status
     *
     * @param $template_name
     *
     */
    public function setTemplate($template_name) {
        $this->template = $template_name;
    }


    /**
     * Method loadTemplate.
     *
     * Loads template using buffered output if called template file exists,
     * saves template content to $output, which is being returned in the end,
     * throws error message if called template file does not exist
     *
     * @return string
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