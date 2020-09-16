<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="row my-5">
  <h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
</div>
<?php if (count($exhibits) > 0): ?>
<div class="row my-5">
  <nav class="navigation secondary-nav" id="secondary-nav">
      <?php echo nav(array(
          array(
              'label' => __('Browse All'),
              'uri' => url('exhibits')
          ),
          array(
              'label' => __('Browse by Tag'),
              'uri' => url('exhibits/tags')
          )
      )); ?>
  </nav>
</div>
<div class="row">
  <?php echo pagination_links(); ?>
</div>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="row exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
      <div class="col-sm-12">
        <h2><?php echo link_to_exhibit(); ?></h2>
      </div>
      <div class="col-sm-12 col-md-4">
        <?php if ($exhibitImage = record_image($exhibit,'original',array('class' => 'img-fluid w-100'))): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage,array('class' => 'd-block w-100 h-100')); ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-12 col-md-8">
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="description"><?php echo $exhibitDescription; ?></div>
        <?php endif; ?>
      </div>

      <div class="col-sm-12">
        <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
        <p class="tags"><?php echo __('Tags: ') . $exhibitTags; ?></p>
        <?php endif; ?>
      </div>
    </div>
<?php endforeach; ?>

<div class="row my-4">
  <?php echo pagination_links(); ?>
</div>

<?php else: ?>
  <div class="row my-5">
    <p><?php echo __('There are no exhibits available yet.'); ?></p>

  </div>
<?php endif; ?>

<?php echo foot(); ?>
