  </div>
  <footer class="clearfix">
    <div class="footer-contents clearfix">
      <div class="about-index-contents clearfix">
        <h2 class="about-index">About Us</h2>
        <p class="about-index-desc"><?php echo get_theme_option('Short About Us'); ?></p>
      </div>
      <div class="social-container clearfix">
        <h2 class="twitter-feed-title">Further Information</h2>
        <div id="further-menu">
          <ul><li><a href="/about/">About</li>
            <li>
              <a href="/terms/">Terms and Conditions</a>
</li>
<li>
          <a href="#" data-cc="c-settings">Cookie Settings</a>
          </li>
          <li>
            <a href="https://warwick.ac.uk/privacy/">Privacy Policy</a>
<li>
          <a href="/accessibility/">Accessibility</a>
</li>
</ul>
        </div>        
      </div>
      <div class="contact-contents clearfix">
        <h2 class="contact">Contact Us</h2>
        <div class="contact-form clearfix">
          <p class="mailer"><?php echo get_theme_option('Contact Us'); ?></p>
        </div>
      </div>
    </div>
    <div class="disclaimer-contents clearfix">
      <p class="disclaimer-statement"><?php echo get_theme_option('Disclaimer'); ?></p>
    </div>
  </footer>

<!-- Generate Thumbnail and Lightbox in individual Object page -->
<script>
      $(document).ready(function() {
           $(".fancybox").fancybox({
              padding : 0
           });
      });
</script>
<script>
        $(window).load(function(){
          $('.download-file').addClass('fancybox');
          $('.download-file').attr('rel', 'group');
          $("<i class='fa fa-search-plus fa-2x' id='hidden'></i>").insertBefore(".full");
          $('.full').mouseenter(function(){
            $('.fa-search-plus').removeAttr("id");
          });
          $('.full').mouseleave(function(){
            $('.fa-search-plus').attr('id','hidden');
          });
          $('body').on('contextmenu','img',function(e){
            return false;
          });
        });
</script>

<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

</body>
</html>