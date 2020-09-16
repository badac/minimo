<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
    $exhibitNavOption = get_theme_option('exhibits_nav');
?>

<?php if ($exhibitNavOption == 'full'): ?>
<div class="row my-5">
  <nav id="exhibit-pages" class="full">
      <?php echo exhibit_builder_page_nav(); ?>
  </nav>
</div>

<?php endif; ?>
<div class="row-col my-5">
<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
</div>

<?php if (count(exhibit_builder_child_pages()) > 0 && $exhibitNavOption == 'full'): ?>

<div class="row- my-4">
  <nav id="exhibit-child-pages" class="secondary-nav">
      <?php echo exhibit_builder_child_page_nav(); ?>
  </nav>
</div>

<?php endif; ?>

<div id="exhibit-blocks">
    <?php exhibit_builder_render_exhibit_page(); ?>
</div>

<div class="my-4" id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
    <div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div>
</div>

<?php if ($exhibitNavOption == 'side'): ?>
<nav id="exhibit-pages" class="side">
    <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>
<?php endif; ?>

<?php echo foot(); ?>
