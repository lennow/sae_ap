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
    <header>
        <div class="nav_line">
            <figure id="logo_wrapper">
                <img src="img/Logo_schwarz.png" alt="Logo schwarz" width="200"/>
            </figure>
            <nav id="main_nav">
                <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
            </nav>
        </div>
        <figure id="banner_wrapper">
            <img src="img/responsive-banner.jpg" alt="Bannerbild" />
        </figure>
    </header>

    <!-- /// HEADER - Wireframe 2 ; Wireframe 3 + 4 ohne Navi /// -->
<!-- <header>
        <figure id="logo_wrapper">
            <img src="img/Logo_weiss.png" alt="Logo weiß" width="300"/>
        </figure>
        <figure id="banner_wrapper">
            <img src="img/responsive-banner.jpg" alt="Bannerbild" />
        </figure>
        <nav id="main_nav">
            <?php //classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
        </nav>
    </header>-->



    <!-- /// MAIN - Wireframe 2 ohne Navi ; Wireframe 3 + 4 mit Navi /// -->
    <div id="main_wrapper">

        <!--<div id="side_wrapper">
            <nav id="main_nav">
                <?php //classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
            </nav>-->

            <!-- Seitenleiste -->
            <aside>
                <div id="sidebar">
                    <figure class="img_aside">
                        <img src="img/Logo_schwarz.png" alt="" width="200"/>
                    </figure>
                    <p>
                        Hier stehen Infos zu:
                    </p>
                    <ul>
                        <li>Sponsoring</li>
                        <li>Spenden</li>
                        <li>Kooperationen</li>
                        <li>Sonstigem</li>
                    </ul>
                </div>
            </aside>
        <!--</div>-->

        <!-- Content -->
        <main>
            <!-- Subnavigationen -->
            <?php if (!isset ($_GET['p']) || $_GET['p'] == "verein") : ?>
                <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="subNavi"); ?>
            <?php endif; ?>

            <?php if (isset ($_GET['p']) && $_GET['p'] == "angebote") : ?>
                <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="projectNavi"); ?>
            <?php endif; ?>

            <!-- Content -->
            <?php if (isset ($_GET['p'])) : ?>
                <?php require_once "pages/" . $this->pageContent; ?>
            <?php else : ?>
                <?php require_once "pages/verein.php"; ?>
            <?php endif; ?>
        </main>
    </div>

    <footer>
        <!-- Kontaktdaten / Adresse -->
        <p>
            Dr. Lena Lehmann<br /><br />
            SAE Institute Leipzig<br />
            Webdesign & Development<br />
            WDD 915
        </p>
        <p>
            Kontakt:<br />
            lena.lehmann@email.de<br />
        </p>

        <!-- Navigation -->
        <nav class="footer_navi">
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>
        </nav>
    </footer>


</body>
</html>