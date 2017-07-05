<?php 

	$bodyclass = 'page simple-page';
    $top = simple_pages_earliest_ancestor_page(null);
    $title = "";
    $subtitle = "";
    
    // Build appropriate page titles
    if (!$top) {
        $top = get_current_record('simple_pages_page');
        $topSlug = metadata($top, 'slug');
    } else {
    	$title = metadata('simple_pages_page', 'title');
    	$subtitle = metadata('simple_pages_page', 'title');
    }
    echo head(array( 'title' => $title, 
    	'bodyclass' => $bodyclass, 
    	'bodyid' => metadata('simple_pages_page', 'slug'),
    	'subtitle' => $subtitle,
    	'currentUriOverride' => url($topSlug)
    ));
    
    // If there is a file that matches the slug of this page, display that as the template
    // Otherwise, use the template below on show.php
    $fname = dirname(__FILE__) . '/' . metadata('simple_pages_page', 'slug') . '.php';
    if (is_file( $fname )):
        include( $fname );
    else:
?>
<div class="terms clearfix" style="   position: relative; float: left; clear: both; width: 100%; border-top: 0.214em solid rgb(225, 127, 0);
    background-color: rgb(50, 78, 107);">
      <h2 class="editorial-title clearfix" style="position: relative; height: auto; margin: 20px auto;     width: 961px;"><?php echo $title ?>Terms</h2>
    <div class="terms-contents clearfix" style="position: relative; height: auto; margin: 20px auto;     width: 961px;">
        <?php
        $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
        echo $this->shortcodes($text);
        ?>
    </div>
    <div class"cleafix"></div>
</div>
<?php
    endif;
    echo foot();




?>
