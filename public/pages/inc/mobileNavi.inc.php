<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 11:46
 *
 * mobile Hauptnavigation (ab 900px Breite)
 *
 */
?>

<div id="nav_icon">
    <i class="fa fa-bars" aria-hidden="true"></i>
</div>
<nav id="mobile_nav">
    <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "frontendNavi"); ?>
</nav>
