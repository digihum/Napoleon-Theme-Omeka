<?php
    $pageTitle = __('Search Items');
    echo head(array('title' => $pageTitle, 'bodyclass' => 'items advanced-search'));
?>

<div class="page-browse">
<section class="masthead clearfix">
    <h2 class="masthead-objects"><?php echo $pageTitle; ?></h2>
</section>


    <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
    <hr>
    <div class="sfb">    
    <?php echo search_form();?>
    </div>
    <p class="searchStatement">Use the search form above to search for items within the Napoleon 100 Days library</p>
<?php echo foot(); ?>
