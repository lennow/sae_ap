<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 03.11.2016
 * Time: 11:51
 *
 * Header (mit Navigation)
 * für Wireframe Version 1
 *
 */
?>

<!-- /// HEADER - Wireframe 1 /// -->

<div class="nav_line" class="clearfix">

    <!-- Logo -->
    <figure id="logo_wrapper">
        <img src="img/Logo_schwarz.png" alt="Logo schwarz"/>
    </figure>
    <!-- Hauptnavigation (Desktop, bis 900px Breite) -->
    <nav id="main_nav">
        <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "frontendNavi"); ?>
    </nav>
    <!-- Hauptnavigation (Mobile, ab 900px Breite) -->
    <?php require_once "pages/inc/mobileNavi.inc.php"; ?>


</div>
<figure id="banner_wrapper">
    <img src="img/responsive-banner.jpg" alt="Bannerbild" />
</figure>
