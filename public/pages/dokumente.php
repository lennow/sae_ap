<h1>Unsere Vereinsdokumente</h1>

<section class="content">

    <div class="download">
        <h3>Lade ein Dokument herunter:</h3>

        <?php foreach ($this->filenames[0] as $index => $array) : ?>
            <a href="uploads/files/<?= $array['uploadName'] ?>" target="_blank"><?= $array['uploadName'] ?></a>
        <?php endforeach; ?>
    </div>

    <div class="upload">
        <h3>Lade ein Dokument hoch:</h3>

        <form class="docs_upload" action="" method="post" enctype="multipart/form-data">
            <label for="upload_field">
                Wähle eine Datei aus:
            </label>
            <input type="file" id="upload_field" name="upload">
            <input type="submit" name="upload[submit]" value="Datei hochladen">
        </form>
    </div>

</section>

