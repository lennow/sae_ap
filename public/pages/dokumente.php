<?php

$this->allDocuments->createDocuments(@$_FILES['upload']);
$allDocs = $this->allDocuments->all;

?>

<pre>
    <?php print_r($_FILES); ?>
</pre>

<h1>Unsere Vereinsdokumente</h1>

<section class="content">

    <div class="download">

        <h3>Lade ein Dokument herunter:</h3>

        <form action="" method="post" id="update_uploads">
            <div>
                <label for="upload_list">
                    Wähle ein Dokument aus:
                </label>
                <select name="upload[select]" id="upload_list">
                    <?php foreach ($allDocs as $item => $articleArray) : ?>
                        <option value="<?= $articleArray['uploadName'] ?>">
                            <?= $articleArray['uploadName'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="submit" name="upload[delete]" value="Dokument löschen">
            </div>
        </form>

    </div>

    <div class="upload">
        <h3>Lade ein Dokument hoch:</h3>

        <form class="docs_upload" action="" method="post" enctype="multipart/form-data">
            <label for="upload_field">
                Wähle eine Datei aus:
            </label>
            <input type="file" id="upload_field">
            <input type="submit" name="upload[submit]" value="Datei hochladen">
        </form>
    </div>

</section>

