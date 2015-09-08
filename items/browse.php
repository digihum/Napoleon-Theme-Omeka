<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse')); ?>
<div class="page-browse">
<section class="masthead clearfix">
    <h2 class="masthead-objects"><?php echo 'Browse all items'; ?></h2>
</section>
    <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
    <hr>    
    <p class="browseStatement">These are the items within the exhibition that are available from the launch date (23rd February 2015) until today. <br /> <em>A new item is released each day</em> for the duration of the exhibition.</p><br />
    
    <div class="browse-items">
        <?php if ($total_results > 0): ?>
        <?php
            $sortLinks[__('Ascending')] = 'Id';
            $sortLinks[__('Descending')] = 'Id';
            ?> 
            <div id="sort-links">
                <span class="sort-label"><?php echo __('Browse objects by: '); ?>
                    <ul>
                        <li><a href="/items/browse?sort_field=id&sort_dir=d">[More Recent]</a></li>
                        <li><a href="/items/browse?sort_field=id&sort_dir=a">[Chronological Order]</a></li>
                    </ul>
                </span>
            </div>
            <!-- Add Date-Gating to objects -->
            <?php foreach (loop('items') as $item):
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

                    switch (true):
                        
                        case ($month == $nowMonth):
                            if ($day <= $nowDay) { ?>
                                <div class="item_browse">
                                    <div class="row">
                                        <div class="itemBrowse">
                                            <?php $image = $item->Files; ?>
                                            <?php if ($image) {
                                                    echo link_to_item('<div style="background-image: url(' . file_display_url($image[0], 'thumbnail') . ');" class="imgBrowse"></div>');
                                                } else {
                                                    echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="imgBrowse"></div>');
                                                }
                                            echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')).'<div id="individualDate">'. metadata('item', array('Dublin Core', 'Date')).'</div>';
                                            echo '<p class="browseDesc">';
                                            echo metadata('item', array('Dublin Core', 'Description'), array('snippet'=>300));
                                            echo '</p>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } else {
                                
                            }
                            break;

                        case ($month < $nowMonth): ?>
                            <div class="item_browse">
                                <div class="row">
                                    <div class="itemBrowse">
                                        <?php $image = $item->Files; ?>
                                        <?php if ($image) {
                                                echo link_to_item('<div style="background-image: url(' . file_display_url($image[0], 'thumbnail') . ');" class="imgBrowse"></div>');
                                            } else {
                                                echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="imgBrowse"></div>');
                                            }
                                        echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')).'<div id="individualDate">'. metadata('item', array('Dublin Core', 'Date')).'</div>';
                                        echo '<p class="browseDesc">';
                                        echo metadata('item', array('Dublin Core', 'Description'), array('snippet'=>300));
                                        echo '</p>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php break;

                        case ($month > $nowMonth):
                             
                            break;
                        default :
                            
                            break;
                    endswitch;?>
            
            <?php endforeach; ?>
            <!-- End Date-Gating -->
        <?php else : ?>
            <p><?php echo 'No items added, yet.'; ?></p>
        <?php endif; ?>
        <?php echo pagination_links(); ?>
    </div>

    <p style="color:rgba(0, 0, 0, 0)">endofdoc</p>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
