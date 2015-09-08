
<?php
    $pageTitle = __('Search OmekaS ') . __('(%s total)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>

<div class="page-search-result clearfix">
<section class="masthead clearfix">
    <h2 class="masthead-searchresults">Search Results</h2>
 </section>
 <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills-search'); ?>
    <hr>
  <section class="searchresults clearfix">
    <?php echo search_form(); ?>
    <!-- <h1><?php echo $pageTitle; ?></h1> -->
    <!-- <h5 class="searchresults1 clearfix"><?php echo search_filters(); ?></h5> -->
    <?php if ($total_results): ?>
        <table id="search-results">
            <thead>
                <tr>
                    <th><?php echo __('Type');?></th>
                    <th><?php echo __('Name');?></th>                    
                    <th><?php echo __('The Object');?></th>
                </tr>
            </thead>
            <tbody>
                <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                <?php foreach (loop('search_texts') as $searchText): ?>
                <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <?php $recordType = $searchText['record_type']; ?>
                <?php set_current_record($recordType, $record); ?>
                <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                    <td>
                        <?php echo $searchRecordTypes[$recordType]; ?>
                    </td>
                    <td>
                        <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                    </td>
                    <td>
                        <?php if ($recordImage = record_image($recordType, 'square_thumbnail')): ?>
                            <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                        <?php endif; ?>
                        <!-- <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Your query returned no results.');?></p>
    <?php endif; ?>

  </section>
</div>
<?php echo foot(); ?>
