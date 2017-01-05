<?php

$all = $this->allArticles->all;

?>

<h1>Unsere nächsten Veranstaltungen</h1>

<section id="articles">
    <?php foreach ($all as $key => $article) : ?>
        <div class="accordion_section">
            <h3 class="accordion_title"><?= $article['articleTitle'] ?></h3>
            <div class="panel">
                <h6><?= $article['articleDate'] ?></h6>
                <p><?= $article['articleText'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>