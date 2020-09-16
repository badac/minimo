<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
<div class="row-col my-5">
  <h1><?php echo metadata('exhibit', 'title'); ?></h1>
</div>
<div class="row-col my-4">
  <?php echo exhibit_builder_page_nav(); ?>
</div>

<div id="primary" class="row">
<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
<div class="exhibit-description col-sm-12">
    <?php echo $exhibitDescription; ?>
</div>
<?php endif; ?>

<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
<div class="exhibit-credits col-sm-12">
    <h3><?php echo __('Credits'); ?></h3>
    <p><?php echo $exhibitCredits; ?></p>
</div>
<?php endif; ?>
</div>

<?php
$pageTree = exhibit_builder_page_tree();
if ($pageTree):
?>
<div class="row-col">
  <nav id="exhibit-pages">
      <?php echo $pageTree; ?>
  </nav>
</div>

<?php endif; ?>

<?php echo foot(); ?>
