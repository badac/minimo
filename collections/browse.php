<?php
$pageTitle = __('Browse Collections');
echo head(array('title' => $pageTitle, 'bodyclass' => 'collections browse'));
?>

<div class="row my-5">
  <div class="col align-middle">
    <nav class="items-nav navigation secondary-nav">
      <?php echo pagination_links(); ?>
    </nav>
  </div>
  <div class="col">
    <h2 class="text-center"><?php echo __('%s collections', $total_results); ?></h2>
  </div>

  <?php
  $sortLinks[__('Title')] = 'Dublin Core,Title';
  $sortLinks[__('Date Added')] = 'added';
  ?>

  <div class="col" id="sort-links">
      <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
  </div>
</div>

<div class="row">
  <?php foreach (loop('collections') as $collection): ?>

  <div class="collection col-sm-1 col-md-4 my-4">
    <div class="card">
      <?php if ($collectionImage = record_image('collection', 'square_thumbnail', array('class'=>'img-fluid card-img-top'))): ?>
          <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
      <?php endif; ?>
      <div class="card-body">
        <div class="card-title">
          <h2><?php echo link_to_collection(); ?></h2>
        </div>

          <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
          <div class="collection-description card-text">
              <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet' => 150))); ?>
          </div>
        <?php endif; ?>

        <?php if ($collection->hasContributor()): ?>
        <div class="collection-contributors">
            <p>
            <strong><?php echo __('Contributors'); ?>:</strong>
            <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all' => true, 'delimiter' => ', ')); ?>
            </p>
        </div>
        <?php endif; ?>

        <?php echo link_to_items_browse(__('View', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id')), array('class' => 'btn btn-outline-primary')); ?>
        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
      </div>
    </div>

  </div><!-- end class="collection" -->

  <?php endforeach; ?>
</div>


<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections' => $collections, 'view' => $this)); ?>

<?php echo foot(); ?>
