<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 29.12.2016
 * Time: 16:49
 *
 * Klasse ArticleController
 *
 * archiviert Uploads in DB
 * und gibt sie wieder aus
 *
 * Methoden:
 * __construct()
 * run_articles()
 *
 */


namespace classes\mvc_articles;

use classes\mvc_articles\ArticleModel;


class ArticleController
{

    public $allArticles;
    private $articleModel;


    public function __construct () {
        $this->articleModel = new ArticleModel();
        $this->run_articles();
    }

    public function run_articles () {
        $this->allArticles = $this->articleModel->getAllArticlesFromDB();
    }

    public function updateArticles ($selectedArticle) {

        if (isset ($selectedArticle['submit'])) {
            $update = $this->articleModel->getSpecialArticleFromDB($selectedArticle);
            return $update;
        }
    }

}