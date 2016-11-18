<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 11.11.2016
 * Time: 13:12
 */

$projectPage = \classes\helpers\NavigationHelper::$navArray['projects'];

?>

<nav>
    <ul>
        <?php foreach ($projectPage as $pageName => $pageTitle) : ?>
            <li>
                <a href="?p=<?= $_GET['p'] ?>&sub=<?= $pageName ?>"><?= $pageTitle ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>