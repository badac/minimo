<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items tags'));
?>
<div class="col-sm-12 my-4">
    <h1><?php echo $pageTitle; ?></h1>

    <nav class="navigation items-nav secondary-nav">
        <?php echo public_nav_items(); ?>
    </nav>

    <?php echo tag_cloud($tags, 'items/browse'); ?>

    <?php echo foot(); ?>
</div>