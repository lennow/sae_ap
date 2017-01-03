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


class ArticleController
{

    public $all;
    private $articleModel;


    public function __construct () {
        $this->articleModel = new ArticleModel();
        $this->all = $this->articleModel->getAllArticlesFromDB();
    }

    public function createArticles ($article) {

        if (isset ($article['article']['submit'])) {
            if (isset ($article['update'])) {
                $this->articleModel->updateArticleInDB($article['update']);
            } else {
                $this->articleModel->insertArticleToDB($article['article']);
            }
        }

    }

    public function updateArticles ($selected) {

        if (isset ($selected['update']['submit'])) {
            $update = $this->articleModel->getSpecialArticleFromDB($selected['update']);
            return $update;
        } elseif (isset ($selected['update']['delete'])) {
            $this->articleModel->deleteArticleFromDB($selected['update']);
        }

    }

}