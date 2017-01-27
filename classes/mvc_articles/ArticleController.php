<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 09.11.2016
 * Time: 11:20
 *
 */


namespace classes\mvc_articles;

use classes\traits\Header;

/**
 * Class ArticleController.
 *
 * Create, read, update and delete articles or events (CRUD)
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_articles
 *
 */
class ArticleController
{

    use Header;

    /**
     * Array all.
     *
     * Receives and stores all articles or events from database
     *
     * @var array
     *
     */
    public $all;

    /**
     * @var string
     */
    public $page = "artikel";

    /**
     * Object articleModel.
     *
     * Instance of class ArticleModel
     *
     * @var ArticleModel
     *
     */
    private $articleModel;


    /**
     * ArticleController constructor.
     *
     * instantiates ArticleModel,
     * reads all articles from database
     *
     */
    public function __construct () {
        $this->articleModel = new ArticleModel();
        $this->all = $this->articleModel->getAllArticlesFromDB();
    }

    /**
     * Method createArticles.
     *
     * Create new articles or events, save them to database
     *
     * @param $article
     *
     */
    public function createArticles ($article) {

        if (isset ($article['article']['submit'])) {
            if ($article['article']['id'] == "") {
                $this->articleModel->insertArticleToDB($article['article']);
                $this->refresh($this->page);
            }
        }

    }

    /**
     * Method readArticles.
     *
     * Reads selected article or event from database.
     *
     * @param $clicked
     * @return array
     *
     */
    public function readArticles ($clicked) {

        if ($clicked  == 'edit') {
            $update = $this->articleModel->getSpecialArticleFromDB($_GET['edit']);
            return $update;
        }

    }

    /**
     * Method updateArticles.
     *
     * Update articles or events, save them to database
     *
     * @param $article
     *
     */
    public function updateArticles ($article) {

        if (isset ($article['article']['submit'])) {
            if ($article['article']['id'] != "") {
                $this->articleModel->updateArticleInDB($article['article']);
                $this->refresh($this->page);
            }
        }

    }

    /**
     * Method deleteArticles.
     *
     * Removes selected article or event from database
     *
     * @param $clicked
     *
     */
    public function deleteArticles ($clicked) {

        if ($clicked == 'delete') {
            $this->articleModel->deleteArticleFromDB($_GET['delete']);
            $this->refresh($this->page);
        }

    }

}