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

    <header>
        <figure>
            <img src="img/Logo_weiss.png" alt="Logo" />
        </figure>

        <!-- Navigation => falls width < viewport -->
        <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], $sub="frontendNavi"); ?>

        <!-- Banner => falls width < viewport -->
        <figure>
            <img src="img/responsive-banner.jpg" alt="Bannerbild" />
        </figure>

    </header>

    <div id="main_wrapper">

        <!-- Navigation -->
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