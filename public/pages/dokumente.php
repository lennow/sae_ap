<?php

$allDocs = $this->allDocuments->all;
$upload = $this->allDocuments->saveUploadedFiles(@$_FILES['upload']);
$this->allDocuments->downloadDocuments(@$_POST['upload']);
$this->allDocuments->deleteDocuments(@$_POST['upload']);

?>

<h1>Unsere Vereinsdokumente</h1>

<section class="content">

    <div class="download">

        <h3>Lade ein Dokument herunter:</h3>

        <form action="" method="post">
            <label for="upload_list" class="backend_label">
                Wähle ein Dokument aus:
            </label>
            <select name="upload[select]" id="upload_list">
                <?php foreach ($allDocs as $item => $articleArray) : ?>
                    <option value="<?= $articleArray['uploadName'] ?>">
                        <?= $articleArray['uploadName'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="crud">
                <div>
                    <input type="submit" name="upload[download]" value="Dokument herunterladen">
                </div>
                <div>
                    <input type="submit" name="upload[delete]" value="Dokument löschen">
                </div>
            </div>
        </form>

    </div>

    <div class="upload">
        <h3>Lade ein Dokument hoch:</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="upload_field" class="backend_label">
                Wähle eine Datei aus:
            </label>
            <input type="file" id="upload_field" name="upload">
            <input type="submit" name="upload[submit]" value="Datei hochladen">
        </form>
        <p class="error">
            <?php if (isset ($upload)) : ?>
                <?php foreach ($upload as $key => $error) : ?>
                    <?php if (isset ($key)) : print_r($error); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </p>
    </div>

</section>
