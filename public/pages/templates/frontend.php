<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 03.11.2016
 * Time: 11:51
 *
 * Frontend Template für alle Seiten
 *
 */
?>

<!doctype html>
<html>
<head>
    <title>Vereinsname</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- CSS Dateien -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="libraries/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>

    <!-- /// HEADER - Version 1 = Wireframe 1 / Version 2 = Wireframe 2, 3 & 4 (ohne Navi)/// -->

    <header>
        <?php //require_once "pages/templates/version_1/header.php"; ?>
        <?php require_once "pages/templates/version_2/header.php"; ?>
    </header>


    <!-- /// MAIN - Wireframe 2 ohne Navi ; Wireframe 3 + 4 mit Navi /// -->
    <div id="main_wrapper">

        <div id="side_wrapper">

            <!-- Hauptnavigation (Desktop, >700px Breite) - NUR mit Wireframe 3 oder 4! -->
            <nav id="main_nav">
                <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "frontendNavi"); ?>
            </nav>

            <!-- Seitenleiste -->
            <aside>
                <div id="sidebar">
                    <figure class="img_aside">
                        <img src="img/Logo_schwarz.png" alt=""/>
                    </figure>
                    <div class="sidebar_content">
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
                </div>
            </aside>
        </div>

        <!-- Content -->
        <main class="clearfix">

            <!-- Hauptnavigation (Mobile, <700px Breite) - NUR mit Wireframe 3 oder 4! -->
            <?php require_once "pages/inc/mobileNavi.inc.php"; ?>

            <!-- Logo (Mobile, <400px Breite) -->
            <figure id="logo_mobile">
                <img src="img/Logo_schwarz.png" alt="Logo schwarz"/>
            </figure>

            <!-- Subnavigationen -->
            <?php if (!isset ($_GET['p']) || $_GET['p'] == "verein") : ?>
                <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "subNavi"); ?>
            <?php endif; ?>

            <?php if (isset ($_GET['p']) && $_GET['p'] == "angebote") : ?>
                <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "projectNavi"); ?>
            <?php endif; ?>

            <!-- Content -->
            <?php if (isset ($_GET['p'])) : ?>
                <?php if (isset ($_GET['sub'])) : ?>
                    <?php require_once "pages/" . $_GET['sub'] . ".php"; ?>
                <?php else : ?>
                    <?php require_once "pages/" . $this->pageContent; ?>
                <?php endif; ?>
            <?php else : ?>
                <?php require_once "pages/verein.php"; ?>
                <?php endif; ?>
        </main>

        <!-- Seitenleiste rechts - NUR mit Wireframe 4 !!! -->
        <aside id="sidebar_right">
            <div>
                <figure class="img_aside">
                    <img src="img/Logo_schwarz.png" alt=""/>
                </figure>
                <div class="sidebar_content">
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
            </div>
        </aside>

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
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "frontendNavi"); ?>
        </nav>
    </footer>

<!-- jQuery -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>