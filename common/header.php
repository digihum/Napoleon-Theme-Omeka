<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <meta name="keywords" content="Napoleon, Napoleon 100 days, 100days.eu, Warwick Napoleon, Napoleon Tuna Army, Napoleon Robinson Crusoe"/>
  <meta property="og:title" content="Napoleon's Last Stand 1815" />
  <meta property="og:site_name" content="The Last Stand: 100 Days in 100 Objects"/>
  <meta property="og:url" content="http://www.100days.eu/" />
  <meta property="og:description" content="Everyone has heard of Waterloo. 
  Less well-known is that Napoleon had already been defeated in 1814, 
  but escaped his exile on Elba in February 1815, swept across France gathering troops, 
  and toppled the newly restored Bourbon monarchy in Paris without firing a shot. 
  Only then was he defeated at Waterloo in June 1815, finally surrendering in July. 
  Day by day, this website releases an object that sheds light on these dramatic events, 
  along with weekly summaries outlining the period more broadly. " />
  <meta property="og:image" content="../images/social_sharing_img.jpg" />

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

  <!-- CSS files -->
    <?php 
        queue_css_file('standardize');
        queue_css_file('styles-newlogo');
        queue_css_file('lean-slider');
        queue_css_file('timeline');
        queue_css_file('sample-styles');
        queue_css_file('jquery.remodal');
        queue_css_file('lightSlider');
        queue_css_file('jquery.fancybox');
        echo head_css();
    ?>
<?php 
$d = date('d') * 1;
$y = date('Y');
$m = (date('m') - 1);

  echo("<script>");
  echo("var dateNow = new Date(");
  echo ($y.",");
  echo ($m.",");
  echo ($d);
  echo(");");
  echo("</script>");
?>
  <!-- Javascripts -->
    <?php 
        queue_js_file('jquery-min');
        queue_js_file('rimages');
        queue_js_file('tweecool.min');
        queue_js_file('lean-slider');
        queue_js_file('storyjs-embed');
        queue_js_file('timeline-min');
        queue_js_file('napjson');
        queue_js_file('jquery.remodal');
        queue_js_file('jquery.lightSlider');
        queue_js_file('jquery.fancybox.pack');
        queue_js_file('app');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Font-Awesome Support -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Google Analytics -->

</head>
<body class="body page-index clearfix remodal-bg">
  <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
  <header class="index clearfix">
    <section class="admin-bar"></section>
    <section class="header">
      <div class="header-content">
        <a href="/" ><h1 class="site-title index"><?php echo __('THE LAST STAND'); ?></h1>
        <p class="subtitle index"><?php echo __('NAPOLEON&#8217S 100 DAYS IN 100 OBJECTS <br /> FEBRUARY - JULY 1815'); ?></p></a>
        <img class="logo-warwick" alt="University of Warwick Logo" src="/themes/Napoleon-Theme/images/warwick_external_mono.svg" data-rimage data-src="/themes/Napoleon-Theme/images/warwick_external_mono.svg" >
        <nav class="site-navigation">
          <ul class="clearfix">
            <li class="_container-2">
              <a href="/" class="home">HOME</a>
            </li>
            <li class="_container-3">
              <a href="/about" class="about">ABOUT</a>
            </li>
            <li class="_container-4">
              <a href="/timeline" class="timeline">TIMELINE</a>
            </li>
            <li class="_container-5">
              <a href="/items/browse?sort_field=id&sort_dir=a" class="objects">OBJECTS</a>
            </li>
            <li class="_container-6">
              <a href="/events" class="events">CONCERT</a>
            </li>
            <li class="_container-7">
              <a href="/links" class="links">LINKS</a>
            </li>
          </ul>
        </nav>
        <input class="sitewide-search" placeholder="" type="text">
        <?php echo search_form(); ?>
      </div>
    </section>
  </header>
  <div id="isi">
        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>