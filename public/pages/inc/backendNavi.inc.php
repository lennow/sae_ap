<?php
/**
 * Created by PhpStorm.
 * User: Lena Lehmann
 * Date: 10.11.2016
 * Time: 11:46
 */

$backPage = \classes\helpers\NavigationHelper::$navArray['backend'];

?>

<ul>
    <?php foreach ($backPage as $pageName => $pageTitle) : ?>
        <li>
            <a href="?p=<?= $pageName ?>"><?= $pageTitle ?></a>
        </li>
    <?php endforeach; ?>
</ul>
