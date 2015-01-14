<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

  <!-- Building the page <title> -->
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
        queue_css_file('standardize');
        queue_css_file('styles');
        echo head_css();
    ?>

  <!-- Need more JavaScript files? Include them here -->
    <?php 
        queue_js_file('jquery-min');
        queue_js_file('rimages');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="body page-index clearfix">
  <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
  <header class="index clearfix">
    <section class="admin-bar"></section>
    <section class="header">
      <div class="header-content">
        <h1 class="site-title index"><?php echo __('THE LAST STAND'); ?></h1>
        <p class="subtitle index"><?php echo __('NAPOLEON&#8217S 100 DAYS IN 100 OBJECTS'); ?></p>
        <img class="logo-warwick" alt="University of Warwick Logo" src="/NapoleonOmeka/themes/Napoleon-Theme/images/warwick-logo-204-204x70.jpg" data-rimage data-src="/NapoleonOmeka/themes/Napoleon-Theme/images/warwick-logo-204-204x70.jpg">
        <nav class="site-navigation">
          <ul class="clearfix">
            <li class="_container-2">
              <a href="/" class="home">HOME</a>
            </li>
            <li class="_container-3">
              <a href="/NapoleonOmeka/about" class="about">ABOUT</a>
            </li>
            <li class="_container-4">
              <a href="/NapoleonOmeka/timeline" class="timeline">TIMELINE</a>
            </li>
            <li class="_container-5">
              <a href="/NapoleonOmeka/objects" class="objects">OBJECTS</a>
            </li>
            <li class="_container-6">
              <a href="/NapoleonOmeka/events" class="events">EVENTS</a>
            </li>
            <li class="_container-7">
              <a href="/NapoleonOmeka/links" class="links">LINKS</a>
            </li>
          </ul>
        </nav>
        <input class="sitewide-search" placeholder="search for an item here" type="text">
      </div>
    </section>
  </header>
  <div id="isi">
        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>