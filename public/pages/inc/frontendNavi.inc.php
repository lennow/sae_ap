<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 11:46
 */

$frontPage = \classes\helpers\NavigationHelper::$navArray['frontend'];

?>

<nav id="main_nav">
    <ul>
        <?php foreach ($frontPage as $pageName => $pageTitle) : ?>
            <li>
                <a href="?p=<?= $pageName ?>"><?= $pageTitle ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
