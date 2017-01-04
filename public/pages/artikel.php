<?php

$this->allArticles->createArticles(@$_POST);
$all = $this->allArticles->all;
$update = $this->allArticles->updateArticles(@$_POST);

?>


<h1>Veranstaltungen verwalten</h1>

<div class="article_create">
    <h3>Veranstaltung erstellen:</h3>

    <form action="" method="post" id="create_article">
        <div>
            <input type="hidden"
                   name="article[id]"
                   <?php if (isset ($update[0])) : ?>value="<?= $update[0]['articleID'] ?>"<?php endif; ?>>
        </div>
        <div>
            <label for="title">Titel</label>
            <input type="text"
                   id="title"
                   name="article[title]"
                   placeholder="Titel der Veranstaltung"
                   <?php if (isset ($update[0])) : ?>value="<?= $update[0]['articleTitle'] ?>"<?php endif; ?>>
        </div>
        <div>
            <label for="date">Datum</label>
            <input type="date"
                   id="date"
                   name="article[date]"
                   placeholder="Datum der Veranstaltung [tt.mm.jjjj]"
                   <?php if (isset ($update[0])) : ?>value="<?= $update[0]['articleDate'] ?>"<?php endif; ?>>
        </div>
        <div>
            <label for="text">Inhalt</label>
            <textarea id="text" name="article[text]" placeholder="Beschreibung der Veranstaltung"><?php if (isset ($update[0])) : echo $update[0]['articleText'] ?><?php endif; ?></textarea>
        </div>
        <div>
            <input type="submit" id="submit" name="article[submit]" value="Abschicken">
        </div>
    </form>
</div>

<div class="article_create">
    <h3>Veranstaltung bearbeiten:</h3>

    <form action="" method="post">
        <label for="article_list">Wähle einen Artikel aus:</label>
        <select name="update[select]" id="article_list">
            <?php foreach ($all as $item => $articleArray) : ?>
                <option value="<?= $articleArray['articleTitle'] ?>">
                    <?= $articleArray['articleTitle'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="crud">
            <div>
                <input type="submit" name="update[submit]" value="Artikel bearbeiten">
            </div>
            <div>
                <input type="submit" name="update[delete]" value="Artikel löschen">
            </div>
        </div>
    </form>
</div>
