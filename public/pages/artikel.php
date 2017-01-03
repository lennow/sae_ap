<?php

$this->allArticles->createArticles(@$_POST);
$all = $this->allArticles->all;
$update = $this->allArticles->updateArticles(@$_POST);

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
            <?php foreach ($all as $item => $articleArray) : ?>
                <option value="<?= $articleArray['articleTitle'] ?>">
                    <?= $articleArray['articleTitle'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="articles_crud">
        <div>
            <input type="submit" name="update[submit]" value="Artikel bearbeiten">
        </div>
        <div>
            <input type="submit" name="update[delete]" value="Artikel löschen">
        </div>
    </div>
</form>
