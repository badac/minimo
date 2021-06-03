<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<div class="row my-5">
  <h1><?php echo $pageTitle; ?></h1>
</div>
<div class="row my-4">
  <div class="col-sm-12">
    <?php echo search_filters(); ?>
  </div>
  <?php if ($total_results): ?>
    <div class="col-sm-12">
      <?php echo pagination_links(); ?>
    </div>
</div>


<div class="container-fluid" id="search-results">

  <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
  <?php foreach (loop('search_texts') as $searchText): ?>
    <?php
    $record = get_record_by_id($searchText['record_type'], $searchText['record_id']);



    ?>
    <?php $recordType = $searchText['record_type']; ?>
    <?php set_current_record($recordType, $record); ?>
    <div class="row my-2 py-2 border-top">
      <div class="col-sm-12 col-md-4">
        <?php if ($recordImage = record_image($recordType,'square_thumbnail', array('class' => 'img-fluid') )): ?>
            <?php echo link_to($record, 'show', $recordImage); ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-12 col-md-8 d-flex flex-column">
        <a href="<?php echo record_url($record, 'show'); ?>">
          <h4>
            <?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?>
          </h4>
        </a>
        <p>

          Colección: <?php echo link_to_collection_for_item(null, array('class'=>'btn btn-outline-primary'), 'show'); ?>
        </p>

      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your query returned no results.');?></p>
</div>
<?php endif; ?>
<?php echo foot(); ?>
