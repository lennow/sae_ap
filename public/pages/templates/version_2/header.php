<?php
/**
 * Created by PhpStorm.
 * User: Engelstein IT
 * Date: 03.11.2016
 * Time: 11:51
 *
 * Header (mit Navigation)
 * für Wireframe Version 2
 *
 * Header (ohne Navigation)
 * für Wireframe Versionen 3 und 4
 *
 */
?>

<!-- /// HEADER - Wireframe 2 ; Wireframe 3 + 4 ohne Navi /// -->

<figure id="logo_wrapper">
    <img src="img/Logo_weiss.png" alt="Logo weiss"/>
</figure>
<figure id="banner_wrapper">
    <img src="img/responsive-banner.jpg" alt="Bannerbild" />
</figure>

    <!-- Hauptnavigation (Desktop, bis 900px Breite) -->
<nav id="main_nav">
    <?php //classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "frontendNavi"); ?>
</nav>

    <!-- Hauptnavigation (Mobile, ab 900px Breite) -->
<?php require_once "pages/inc/mobileNavi.inc.php"; ?>