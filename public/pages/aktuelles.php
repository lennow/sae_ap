<?php

$all = $this->allArticles->all;

?>

<h1>Unsere nächsten Veranstaltungen</h1>

<div class="accordion">
    <?php foreach ($all as $key => $article) : ?>
        <h6><?= $article['articleDate'] ?></h6>
        <h3 class="article_toggle"><?= $article['articleTitle'] ?></h3>
        <p><?= $article['articleText'] ?></p>
    <?php endforeach; ?>
</div>