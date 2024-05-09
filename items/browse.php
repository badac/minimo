<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items browse'));
?> 

<div class="row my-5">
  <div class="col align-middle">
    <nav class="items-nav navigation secondary-nav">
        <?php echo public_nav_items(); ?>
    </nav>
  </div>

  <div class="col">
   <h2 class="text-center"><?php echo __('%s items', $total_results); ?></h2> 
  </div>

  <?php if ($total_results > 0): ?>
    <?php
    $sortLinks[__('Title')] = 'Dublin Core,Title';
    $sortLinks[__('Creator')] = 'Dublin Core,Creator';
    $sortLinks[__('Date Added')] = 'added';
    ?>

    <div class="col" id="sort-links">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>
  </div>
<?php endif; ?>

<div class="row my-5">
  <div class="col-sm-12">
    <?php echo item_search_filters(); ?>
    <?php echo pagination_links(); ?>
  </div>
</div>
<div class="card-columns">
  <?php foreach (loop('items') as $item): ?>
    <div class="item hentry card">
      <?php if (metadata('item', 'has files')): ?>
          <?php echo link_to_item(item_image(null, array('class' => 'img-fluid card-img-top'), 0, $item), array('class'=>'stretched-link')); ?>
      <?php endif; ?>
      <div class="card-body">
          <h3 class="card-title"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class' => 'permalink')); ?></h3>

          <?php $date = metadata($item, array('Dublin Core', 'Date')); ?>

          <?php if ($date): ?>
              <h6 class="card-subtitle"><?php echo $date; ?></h6>
          <?php endif; ?>

          <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
          <div class="item-description card-text">
              <?php echo $description; ?>
          </div>
        <?php endif; ?>
        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo tag_string('items'); ?></p>
        </div>
        <?php endif; ?>
        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' => $item)); ?>

      </div>
    </div>
  <?php endforeach; ?>
</div>



<div class="row">
  <div class="col">
    <?php echo pagination_links(); ?>
  </div>
</div>
<div class="row">
  <div class="col">
    <div id="outputs">
        <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
        <?php echo output_format_list(false); ?>
    </div>
  </div>
</div>


<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>

<?php echo foot(); ?>
