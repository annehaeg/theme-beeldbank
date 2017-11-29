<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
//        queue_css_file('lib/bootstrap.min');
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_url('http://code.jquery.com/jquery-1.11.0.min.js');
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<div class="ubercontainer">
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner">
        <div class="offcanvas" id="offcanvas">
        <div id="hamburgercontainer" class="hidden-de">
            <a href="#" id="navigation-toggle" onfocus="navToggle()"><i class="fa fa-bars fa-lg"></i></a>
        </div>
<!--        <div id="offcanvas_list">-->
<!--            --><?php //echo public_nav_main_bootstrap(); ?>
<!--        </div>-->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3 center">
                    <a href="https://www.arteveldehogeschool.be/"><img data-pin-nopin='niet' id='arteveldelogo' src="<?php echo img('arteveldelogo.png'); ?>" /></a>
                </div>
                <div class="col-9 hidden-sm right font-bold desktopnavigation">
                    <h1 class="font-bold">
                        <?php echo option('site_title'); ?>
                    </h1>
                    <?php echo public_nav_main_bootstrap(); ?>
                </div>

                <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            </div>
        </div>
        <div class="linecontainer">
            <div class="line orangeline"></div>
            <div class="line blueline"></div>
            <div class="line magentaline"></div>
            <div class="line greenline"></div>
        </div>
    </header>
    <main id="content" role="main">
      <div class="container">
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
