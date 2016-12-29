<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 21.12.2016
 * Time: 11:51
 *
 * Backend Template für alle Seiten
 *
 */
?>

<!doctype html>
<html>
<head>
    <title>Backend Vereinsname</title>
    <meta charset="utf-8">

    <!-- CSS Dateien -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="libraries/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body id="backend">

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

    <!-- /// HEADER Backend /// -->

    <header id="backend_header">
        <figure>
            <img src="img/Logo_weiss.png" alt="Logo weiss"/>
        </figure>
        <nav>
            <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "backendNavi"); ?>
        </nav>
    </header>

    <!-- /// MAIN Backend /// -->

    <main id="backend_main">
        <?php if (isset ($_SESSION['username']) && isset($_GET['p'])) : ?>
        <?php require_once "pages/" . $_GET['p'] . ".php"; ?>
        <?php endif; ?>
    </main>

<!-- jQuery -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>