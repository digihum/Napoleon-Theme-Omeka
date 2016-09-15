<?php echo head(array('bodyid'=>'home')); ?>

<section class="hero clearfix">
    <div class="hero-contents clearfix">
      <section class="object-display clearfix">
        <div class="object-slider" id="slider-frame">
          <div id="slider-loading-wrapper"><div id="slider-loading-img"></div><p>Loading data...</p></div>
        <div id="slider">
        
        </div>
         <div id="slider-direction-nav"></div>
        <div id="slider-control-nav"></div>
        </div>
        <div id="title">

        </div>
      </section>
      <article class="clearfix">
        <h2 class="introduction-title">The Exhibition</h2>
        <p class="introduction"><?php echo get_theme_option('Introduction Text'); ?> 
</p>
        <button id="redButton" onclick="location.href='/items/show/2';"><?php echo get_theme_option('Red Button'); ?></button>
      </article>
    </div>
  </section>
  <section class="collaborators">
    <div class="collaborators-contents clearfix">
      <h4 class="collaboration">in collaboration with</h4>
      <div class="logo-collaborators clearfix">
        <img class="image image-1" src="/themes/Napoleon-Theme/images/warwick_external_colour_150.png" data-rimage data-src="/themes/Napoleon-Theme/images/warwick-logo-white-200-200x61.jpg" >
        <div class="ehrc">
          <p>European History</p>
          <p>Research Centre</p>
</div>
        <div class="hrf">
          <p>Humanities</p>
          <p>Research Fund</p>
</div>
        <img class="image image-2" src="/themes/Napoleon-Theme/images/ahrc-logo-120-120x128.jpg" data-rimage data-src="/themes/Napoleon-Theme/images/ahrc-logo-120-120x128.jpg">
      </div>
    </div>
  </section>
<script>
  loadHomePage();
</script>
<!-- Capture latest object url, apply to red button
<script type="text/javascript">
    var newestLink = "";
    window.setTimeout(function(){
        var newLink = $('.link:last').attr("href");
        newestLink = newLink;
    }, 1500);

    window.setTimeout(function(){
        var node = $('#redButton');
        node.attr('onClick', 'window.location="' + newestLink + '"');
    }, 1800);
</script>
End capture -->
<?php echo foot(); ?>