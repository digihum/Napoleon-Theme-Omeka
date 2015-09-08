

<div class="page-events">
<section class="masthead clearfix">
    <h2 class="masthead-events">Upcoming Events</h2>
</section>

<!-- This is for Event 1 -->
<?php 

$checkbox1=get_theme_option('Event 1 Checkbox');

if ($checkbox1==1) {
  echo " ";
} else {
  echo <<<LALA
<section class="events-indi event-2 clearfix">
<div class="event-contents clearfix">
  <p> There is no event at the moment. Please check later. Thank you </p>
</div>
</section> <!-- 
LALA;
}  

?>
  <section class="events events-2 clearfix">
    <div class="event-contents clearfix">
      <div class="calendar">
        <div class="month-bg clearfix">
          <p class="month"><?php echo get_theme_option('Event 1 Month'); ?></p>
        </div>
        <div class="date-bg clearfix">
          <p class="date"><?php echo get_theme_option('Event 1 Date'); ?></p>
        </div>
      </div>
      <div class="event-node">
        <div class="event-details">
          <p><?php echo get_theme_option('Event 1 Desc'); ?></p>
        </div>
        <h2 class="event-title"><?php echo get_theme_option('Event 1 Title'); ?></h2>
      </div>
      <button class="signup" onClick="window.location='<?php echo get_theme_option('Event 1 Url'); ?>';">More Information</button>
    </div>
  </section>
<?php 

$checkbox1=get_theme_option('Event 1 Checkbox');
if ($checkbox1==1) {
  echo " " ;
} else {
  echo "-->" ;
} 

?> 

<!-- This is for Event 2 -->

<?php 

$checkbox2=get_theme_option('Event 2 Checkbox');

if ($checkbox2==1) {
  echo " ";
} else {
  echo "<!--";
}  

?>
  <section class="events events-2 event2 clearfix">
    <div class="event-contents clearfix">
      <div class="calendar">
        <div class="month-bg clearfix">
          <p class="month"><?php echo get_theme_option('Event 2 Month'); ?></p>
        </div>
        <div class="date-bg clearfix">
          <p class="date"><?php echo get_theme_option('Event 2 Date'); ?></p>
        </div>
      </div>
      <div class="event-node">
        <div class="event-details">
          <p><?php echo get_theme_option('Event 2 Desc'); ?></p>
        </div>
        <h2 class="event-title"><?php echo get_theme_option('Event 2 Title'); ?></h2>
      </div>
      <button class="signup" onClick="window.location='<?php echo get_theme_option('Event 2 Url'); ?>';">More Information</button>
    </div>
  </section>
<?php 

$checkbox2=get_theme_option('Event 2 Checkbox');
if ($checkbox2==1) {
  echo " " ;
} else {
  echo "-->" ;
} 

?> 

<!-- This is for Event 3 -->

<?php 

$checkbox3=get_theme_option('Event 3 Checkbox');

if ($checkbox3==1) {
  echo " ";
} else {
  echo "<!--";
}  

?>
  <section class="events events-2 event3 clearfix">
    <div class="event-contents clearfix">
      <div class="calendar">
        <div class="month-bg clearfix">
          <p class="month"><?php echo get_theme_option('Event 3 Month'); ?></p>
        </div>
        <div class="date-bg clearfix">
          <p class="date"><?php echo get_theme_option('Event 3 Date'); ?></p>
        </div>
      </div>
      <div class="event-node">
        <div class="event-details">
          <p><?php echo get_theme_option('Event 3 Desc'); ?></p>
        </div>
        <h2 class="event-title"><?php echo get_theme_option('Event 3 Title'); ?></h2>
      </div>
      <button class="signup" onClick="window.location='<?php echo get_theme_option('Event 3 Url'); ?>';">More Information</button>
    </div>
  </section>
<?php 

$checkbox3=get_theme_option('Event 3 Checkbox');
if ($checkbox3==1) {
  echo " " ;
} else {
  echo "-->" ;
} 

?> 
</div>