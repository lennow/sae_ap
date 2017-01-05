<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 09.11.2016
 * Time: 11:20
 *
 * Klasse ArticleController
 *
 * steuert Erstellung und Verwaltung der Veranstaltungen (CRUD)
 *
 * Eigenschaften:
 * $all (leere public Variable)
 * $page (gibt Seite für Redirect an)
 * $articleModel (leere public Variable)
 *
 * Methoden:
 * __construct()
 * createArticles()
 * updateArticles()
 *
 */


namespace classes\mvc_articles;
use classes\traits\Redirect;


class ArticleController
{

    use Redirect;

    public $all;
    public $page = "artikel";
    private $articleModel;


    /**
     * Konstruktor
     *
     * instanziiert ArticleModel
     * holt alle Veranstaltungen aus der Datenbank
     *
     */
    public function __construct () {
        $this->articleModel = new ArticleModel();
        $this->all = $this->articleModel->getAllArticlesFromDB();
    }


    /**
     * Erstellung neuer Artikel
     *
     * wenn Artikel noch nicht in DB, wird er reingeschrieben
     * wenn Artikel schon in DB, wird er aktualisiert
     *
     *
     * @param $article
     *
     */
    public function createArticles ($article) {

        if (isset ($article['article']['submit'])) {
            if ($article['article']['id'] == "") {
                $this->articleModel->insertArticleToDB($article['article']);
                $this->refresh($this->page);
            } else {
                $this->articleModel->updateArticleInDB($article['article']);
                $this->refresh($this->page);
            }
        }

    }


    /**
     * Artikel/Veranstaltungen updaten oder löschen
     *
     *
     * @param $selected
     * @return array (ausgewählter Artikel)
     *
     */
    public function updateArticles ($selected) {

        if (isset ($selected['update']['submit'])) {
            $update = $this->articleModel->getSpecialArticleFromDB($selected['update']);
            return $update;
        } elseif (isset ($selected['update']['delete'])) {
            $this->articleModel->deleteArticleFromDB($selected['update']);
            $this->refresh($this->page);
        }

    }

}