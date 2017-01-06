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
 * getAllArticlesFromDB()
 * getSpecialArticleFromDB()
 * insertArticleToDB ()
 * updateArticleInDB ()
 * deleteArticleFromDB ()
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


    /**
     * alle Veranstaltungen aus DB auslesen
     *
     * @return array (alle Veranstaltungen aus DB)
     *
     */
    public function getAllArticlesFromDB () {

        $sql = "SELECT * FROM vereine_articles";

        $allArticles = $this->getDataFromDB($sql);
        return $allArticles;

    }


    /**
     * einzelne Veranstaltung aus DB auslesen
     *
     * @param $article (ausgewählter Artikel (Titel))
     * @return array (Veranstaltung aus DB)
     *
     */
    public function getSpecialArticleFromDB ($article) {

        $sql = "SELECT * FROM vereine_articles WHERE articleTitle = :selected";

        $array = [
            ":selected" => $article['select']
        ];

        $allArticles = $this->getDataFromDB($sql, $array);
        return $allArticles;

    }


    /**
     * neue Veranstaltung in DB schreiben
     *
     * @param $article (eingegebener Artikel)
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
     * Veranstaltung in DB aktualisieren
     *
     * @param $article (eingegebener Artikel)
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
     * Veranstaltung aus DB löschen
     *
     * @param $article (ausgewählter Artikel)
     *
     */
    public function deleteArticleFromDB ($article) {

        $sql = "DELETE FROM vereine_articles WHERE articleTitle = :selected";

        $array = [":selected" => $article['select']];

        $this->setDataToDB($sql, $array);

    }

}