<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>
<!-- Break Dates -->
<?php 
$oldDate = metadata('item', array('Dublin Core', 'Date')); 
$latestDate = explode("/", $oldDate);
$year = $latestDate[2];
$month = $latestDate[1];
$day = $latestDate[0];

$newDate = $month.'/'.$day.'/'.$year;
$nowDate = date('m/d/Y');

$nownowDate = explode("/", $nowDate);
$nowYear = $nownowDate[2];
$nowMonth = $nownowDate[0];
$nowDay = $nownowDate[1];
?>
<!-- End Break Dates -->
<div class="page-objects">
<section class="masthead clearfix">
    <h2 class="masthead-objects">The Objects</h2>
</section>
  <section class="objects objects-2">
    <div class="object-contents clearfix">
      <div class="object clearfix">
        <nav class="object-prev-next clearfix">
            <ul class="pager">
                <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
                <li class="next"><?php echo link_to_next_item_show();  ?></li>

<!-- Set Date-Gating to next-item link
<?php
switch (true):
  
  case ($month == $nowMonth):
    if ($day < $nowDay) {
      echo '<li class="next">' . link_to_next_item_show() . '</li>';
    } else {
      echo " ";
    }
    break;

  case ($month < $nowMonth):
    echo '<li class="next">' . link_to_next_item_show() . '</li>';
    break;

  case ($month > $nowMonth):
    echo " "; 
    break;
  default :
    echo " ";
    break;
endswitch; ?>
<!-- End Date-Gating -->         
            </ul>
        </nav>
        <h2 class="object-date">
        <!-- Change Date to more readable format -->
        <?php
        $newestDate = new DateTime($newDate);
        echo $newestDate->format('jS M Y');
        ?>
        <!-- end Date Change -->
        </h2>
        <div id="imageGallery">
        <div class='galleryCenter'>
        <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
            <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
        <?php endif; ?>
        </div>
        </div>
        <h6 class="object-source">Source: <?php echo metadata('item', array('Dublin Core', 'Source')); ?></h6>
        <!-- <h6 class="object-permission">Permission: <?php echo metadata('item', array('Dublin Core', 'License')); ?></h6> -->
      </div>
      <h4 class="link-to-weekly-summary clearfix">
			<a href="/timeline" class="hz-weekly-link"><i class="fa fa-arrow-circle-left"></i> Read what else is happening</a>
      </h4>
      <div class="object-description object-description-1 clearfix">
        <h2 class="object-title"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
        <h6 class="contributed-by">Contributed by: <?php echo metadata('item', array('Dublin Core', 'Contributor')); ?></h6>
        <div class="object-description object-description-2">
          <p><?php echo metadata('item', array('Dublin Core', 'Description')); ?></p>
        </div>
<!-- Conditional statement for Relation -->
<?php
  $moreInfo = metadata('item', array('Dublin Core', 'Relation'));
  if(!empty($moreInfo)) { ?>  
        <button class="more-info" onClick="window.location='#modal';" >For further information, click here</button>
<?php } ?>
<!-- End conditional statement -->
      </div>
      <div class="location clearfix">
        <!-- <h2 class="location-title">Location</h2> -->
        <div class="object-location clearfix">
        <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
        </div>
      </div>
<!-- Conditional statement for References -->
<?php
  $related = metadata('item', array('Dublin Core', 'References'));
  if(!empty($related)){ ?>
<div class="related-links related-links-1 clearfix">
        <h2 class="related-links">Related Links</h2>
        <ul class="clearfix">
          <li class="clearfix">
            <?php echo metadata('item', array('Dublin Core', 'References')); ?>
          </li>
        </ul>
      </div>
<?php } ?>
<!-- End conditional statement -->        
    </div>
  </section>
<!-- Adding remodal popup -->
<div class="remodal" data-remodal-id="modal">
    <p>
      <?php echo metadata('item', array('Dublin Core', 'Relation')); ?>
    </p>
    <br>
    <a class="remodal-confirm" href="#">Return to page</a>
</div>

</div>
<?php
 $index = -1;
 if(isset($_GET['item'])){$index = $_GET['item'];} 
 ?>
 <script>
// loadObjectPage(<?php echo $index; ?>);
</script>
<!-- Adding social bookmarking -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54f6a22f2b66c80c" async="async"></script>
    
<?php echo foot(); ?>
