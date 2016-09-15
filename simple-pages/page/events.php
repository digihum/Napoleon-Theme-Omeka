

<div class="page-events">
<section class="masthead clearfix">
    <h2 class="masthead-events">Concert</h2>
</section>
  <section class="events events-2 clearfix">
    <div class="event-contents clearfix">
		<img src="<?php echo get_theme_option('Concert Img'); ?>" />
      <div class="event-node">
	      
        <div class="event-details">
          <p><?php echo get_theme_option('Concert Desc'); ?></p>
        </div>
        <h2 class="event-title"><?php echo get_theme_option('Concert Title'); ?></h2>
        
      </div>
      <button class="signup" onClick="window.location='<?php echo get_theme_option('Concert Url'); ?>';"><?php echo get_theme_option('Concert Title Btn'); ?></button>
    </div>
  </section>
</div>