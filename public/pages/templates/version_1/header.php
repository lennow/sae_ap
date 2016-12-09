<!-- /// HEADER - Wireframe 1 /// -->

<div class="nav_line">
    <figure id="logo_wrapper">
        <img src="img/Logo_schwarz.png" alt="Logo schwarz" width="200"/>
    </figure>
    <nav id="main_nav">
        <?php classes\helpers\NavigationHelper::createNavigation(@$_SESSION['username'], "frontendNavi"); ?>
    </nav>
</div>
<figure id="banner_wrapper">
    <img src="img/responsive-banner.jpg" alt="Bannerbild" />
</figure>
