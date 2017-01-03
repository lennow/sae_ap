<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 29.12.2016
 * Time: 16:49
 *
 * Klasse ArticleModel
 *
 * archiviert Uploads in DB
 * und gibt sie wieder aus
 *
 * Methoden:
 * __construct()
 * getArticleFromDB()
 * insertArticleToDB()
 *
 */

namespace classes\mvc_articles;


use classes\mvc_pagestructure\Model;

class ArticleModel extends Model
{

    /**
     * Konstruktor
     *
     * führt Konstruktor von Model aus =>
     * initiiert Datenbankverbindung via Trait DB_Connection
     *
     */
    public function __construct() {
        parent::__construct();
    }

    public function getAllArticlesFromDB () {

        $sql = "SELECT * FROM vereine_articles";

        $allArticles = $this->getDataFromDB($sql);
        return $allArticles;

    }

    public function getSpecialArticleFromDB ($article) {

        $sql = "SELECT * FROM vereine_articles WHERE articleTitle = :selected";

        $array = [
            ":selected" => $article['select']
        ];

        $allArticles = $this->getDataFromDB($sql, $array);
        return $allArticles;

    }

    public function insertArticleToDB ($article) {

        $sql = "INSERT INTO vereine_articles 
                (articleTitle, articleText)
                VALUES (:title, :text)";

        $array = [
            ":title" => $article['title'],
            ":text" => $article['text']
        ];

        $this->setDataToDB($sql, $array);

    }

    public function updateArticleInDB ($article) {

        $sql = "UPDATE vereine_articles 
                SET articleTitle = :title, articleText = :text 
                WHERE articleID = :id";

        $array = [
            ":title" => $article['title'],
            ":text" => $article['text'],
            ":id" => $article['id']
        ];

        $this->setDataToDB($sql, $array);

    }

    public function deleteArticleFromDB ($article) {

        $sql = "DELETE FROM vereine_articles WHERE articleTitle = :selected";

        $array = [":selected" => $article['select']];

        $this->setDataToDB($sql, $array);

    }

}