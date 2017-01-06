<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 11:46
 *
 * Unternavigation auf Seite "Verein"
 *
 */

$aboutPage = \classes\helpers\NavigationHelper::$navArray['subnavi'];

?>

<nav class="subnavi">
    <ul>
        <?php foreach ($aboutPage as $pageName => $pageTitle) : ?>
            <li>
                <a href="?p=<?= $_GET['p'] ?>&sub=<?= $pageName ?>"><?= $pageTitle ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
