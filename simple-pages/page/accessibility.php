<?php
        $simplePagesTable = get_db()->getTable('SimplePagesPage');
        $slug = 'accessibility';
        $pages = $simplePagesTable->findBy(array('slug' => $slug));
        $page = $pages[0];
      
    ?>

<div class="page-accessibility">
<section class="masthead clearfix">
    <h2 class="masthead-events">Accessibility</h2>
</section>
  <section class="" style="background: rgba(92, 150, 210, 0.33); height: fit-content; position: inherit; width: 100%">
    <div style="width: 80%; margin: 2em auto;">
      <div class="" style="color: #444; line-height: 1.3em;">
	      
        <div class="">
          <?php echo $page->text; ?>
        </div>
        
      </div>

    </div>
  </section>
  <div class="clearfix"></div>
</div>