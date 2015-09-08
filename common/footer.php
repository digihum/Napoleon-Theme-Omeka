  </div>
  <footer class="clearfix">
    <div class="footer-contents clearfix">
      <div class="about-index-contents clearfix">
        <h2 class="about-index">About Us</h2>
        <p class="about-index-desc"><?php echo get_theme_option('Short About Us'); ?></p>
      </div>
      <div class="social-container clearfix">
        <h2 class="twitter-feed-title">Twitter</h2>
        <div id="tweecool"></div>        
      </div>
      <div class="contact-contents clearfix">
        <h2 class="contact">Contact Us</h2>
        <div class="contact-form clearfix">
          <p class="mailer">If you would like to get in touch with us, drop us an email<a onClick="javascript:window.open('mailto:100days@warwick.ac.uk?Subject=A%20Message%20From%20Napoleon%20Exhibition', 'mail');event.preventDefault()" href="100days@warwick.ac.uk"><i class="fa fa-envelope-o fa-5x"></i></a><br />We will get back to you in due course. In the mean time, check out today's object!</p>
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
</body>
</html>