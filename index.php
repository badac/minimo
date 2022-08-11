<?php echo head(array('bodyid'=>'home')); ?>


<?php if (get_theme_option('Homepage Text')): ?>
<div class="intro">
  <?php echo get_theme_option('Homepage Text'); ?>
</div>
<?php endif; ?>

<?php if (get_theme_option('Display Featured Item') !== '0'): ?>
  <div id="featured">
    <!-- Featured Item -->
    <div id="featured-item">
        <h2 class="my-5 border-primary border-bottom"><?php echo 'Elementos destacados'; ?></h2>
        <div class="row">
          <?php echo random_featured_items(10); ?>
        </div>
    </div><!--end featured-item-->
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
        <h2 class="my-5 border-primary border-bottom "><?php echo __('Featured Collection'); ?></h2>
        <div class="row">
          <?php echo random_featured_collection(); ?>
        </div>
    </div><!-- end featured collection -->
    <?php endif; ?>

    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
  </div> <!-- End Primary Column -->
<?php endif; ?>

<?php
$recentItems = get_theme_option('Homepage Recent Items');
if ($recentItems === null || $recentItems === ''):
    $recentItems = 3;
else:
    $recentItems = (int) $recentItems;
endif;
if ($recentItems):
?>
<div id="recent-items">
    <h2 class="my-5 border-primary border-bottom"><?php echo __('Recently Added Items'); ?></h2>
    <div class="row">
      <?php echo recent_items($recentItems); ?>
    </div>
    <p ><a class="btn btn-outline-primary btn-sm"href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
</div><!--end recent-items -->
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
