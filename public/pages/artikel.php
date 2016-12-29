<?php

$articles = $this->articles->allArticles;
$update = $this->articles->updateArticles(@$_POST['update']);

?>


<h1>Veranstaltungen verwalten</h1>

<h3>Veranstaltung erstellen:</h3>

<form action="" method="post" id="create_article">

    <div>
        <label for="title">Titel</label>
        <input type="text"
               id="title"
               name="article[title]"
               placeholder="Titel des Artikels"
               <?php if (isset ($update[0])) : ?>value="<?= $update[0]['articleTitle'] ?>"<?php endif; ?>>
    </div>

    <div>
        <label for="text">Inhalt</label>
        <textarea cols="50"
                  rows="80"
                  id="text"
                  name="article[text]"
                  placeholder="Inhalt des Artikels">
            <?php if (isset ($update[0])) : ?>
                <?= $update[0]['articleText'] ?>
            <?php endif; ?>
        </textarea>
    </div>

    <div>
        <input type="submit" id="submit" name="article[submit]" value="Abschicken">
    </div>

</form>

<h3>Veranstaltung bearbeiten:</h3>

<form action="" method="post" id="update_article">
    <div>
        <label for="article_list">Wähle einen Artikel aus:</label>
        <select name="update[select]" id="article_list">
            <?php foreach ($articles as $item => $articleArray) : ?>
                <option value="<?= $articleArray['articleTitle'] ?>">
                    <?= $articleArray['articleTitle'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="update[submit]" value="Auswählen">
    </div>
</form>


<?php

// ToDo: Delete => Artikel von Seite und aus DB löschen

    echo '<pre>';
    print_r($update);
    echo '</pre>';

?>