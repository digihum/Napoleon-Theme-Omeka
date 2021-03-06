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
    else :

        echo "this is show.php";// Close your PHP tags and add your show.php content here.

    endif;
    echo foot();




?>