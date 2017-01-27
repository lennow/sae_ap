<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 29.12.2016
 * Time: 16:49
 *
 */

namespace classes\mvc_articles;

use classes\mvc_pagestructure\Model;


/**
 * Class ArticleModel.
 *
 * Reads all or single articles or events from database,
 * inserts and updates articles or events in database,
 * removes articles or events from database
 *
 * @author: Lena Lehmann lena.lehmann@email.de
 *
 * @package classes\mvc_articles
 *
 */
class ArticleModel extends Model
{

    /**
     * ArticleModel constructor.
     *
     * Instantiates parent constructor (in class Model),
     * initiates database connection via trait DB_Connection
     *
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Method getAllArticlesFromDB.
     *
     * Selects and returns all articles or events stored in database
     *
     * @return array
     *
     */
    public function getAllArticlesFromDB () {

        $sql = "SELECT * FROM vereine_articles";

        $allArticles = $this->getDataFromDB($sql);
        return $allArticles;

    }

    /**
     * Method getSpecialArticleFromDB.
     *
     * Selects and returns single, selected article or event from database
     *
     * @param $articleID
     * @return array
     *
     */
    public function getSpecialArticleFromDB ($articleID) {

        $sql = "SELECT * FROM vereine_articles WHERE articleID = :id";

        $array = [
            ":id" => $articleID
        ];

        $article = $this->getDataFromDB($sql, $array);
        return $article;

    }

    /**
     * Method insertArticleToDB.
     *
     * Saves new article or event to database
     *
     * @param $article
     *
     */
    public function insertArticleToDB ($article) {

        $sql = "INSERT INTO vereine_articles 
                (articleTitle, articleDate, articleText)
                VALUES (:title, :date, :text)";

        $array = [
            ":title" => htmlspecialchars($article['title']),
            ":date" => htmlspecialchars($article['date']),
            ":text" => htmlspecialchars($article['text'])
        ];

        $this->setDataToDB($sql, $array);

    }


    /**
     * Method updateArticleInDB.
     *
     * Updates adapted article or event in database
     *
     * @param $article
     *
     */
    public function updateArticleInDB ($article) {

        $sql = "UPDATE vereine_articles 
                SET articleTitle = :title, articleDate = :date, articleText = :text 
                WHERE articleID = :id";

        $array = [
            ":title" => htmlspecialchars($article['title']),
            ":date" => htmlspecialchars($article['date']),
            ":text" => htmlspecialchars($article['text']),
            ":id" => htmlspecialchars($article['id'])
        ];

        $this->setDataToDB($sql, $array);

    }


    /**
     * Method deleteArticleFromDB.
     *
     * Removes selected article or event from database
     *
     * @param $articleID
     *
     */
    public function deleteArticleFromDB ($articleID) {

        $sql = "DELETE FROM vereine_articles WHERE articleID = :id";

        $array = [":id" => $articleID];

        $this->setDataToDB($sql, $array);

    }

}