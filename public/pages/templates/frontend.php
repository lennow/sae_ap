<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 11:51
 */
?>

<!doctype html>
<html>
<head>
    <title>Vereinsname</title>
    <meta charset="utf-8">

    <!-- CSS Dateien -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- jQuery -->

</head>
<body>

<!--
    <pre>
        $GET: <?php //print_r ($_GET); ?>
    </pre>
    <pre>
        $POST: <?php //print_r ($_POST); ?>
    </pre>
    <pre>
        $SESSION: <?php //print_r ($_SESSION); ?>
    </pre>
-->

    <!-- /// HEADER - Wireframe 1 /// -->
    <!--<header>
        <div class="nav_line">
             Logo
            <figure id="logo_wrapper">
                <img src="img/Logo_schwarz.png" alt="Logo schwarz" width="200"/>
            </figure>
             Navigation
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
        </div>
         Banner
        <figure id="banner_wrapper">
            <img src="img/responsive-banner.jpg" alt="Bannerbild" />
        </figure>
    </header> -->

    <!-- /// HEADER - Wireframe 2 ; Wireframe 3 + 4 ohne Navi /// -->
    <header>
        <!-- Logo -->
        <figure id="logo_wrapper">
            <img src="img/Logo_weiss.png" alt="Logo weiß" width="300"/>
        </figure>
        <figure id="banner_wrapper">
            <img src="img/responsive-banner.jpg" alt="Bannerbild" />
        </figure>
        <!-- Navigation -->
        <?php //classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
    </header>



    <!-- /// MAIN - Wireframe 2 ohne Navi ; Wireframe 3 + 4 mit Navi /// -->
    <div id="main_wrapper">

        <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>

        <!-- Seitenleiste -->
        <aside>
            <div id="sidebar">

            </div>
        </aside>

        <!-- Content -->
        <main>
            <!-- Subnavigationen -->
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="subNavi"); ?>
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="projectNavi"); ?>

            <!-- Content -->
            <?php if (isset ($_GET['p'])) : ?>
                <?php require_once "pages/" . $this->pageContent; ?>
            <?php else : ?>
                <?php require_once "pages/verein.php"; ?>
            <?php endif; ?>
        </main>
    </div>

    <footer>
        <div></div>
        <div class="footer_navi">
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
        </div>
    </footer>


</body>
</html>