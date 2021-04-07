  <!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts','style'));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_url('https://code.jquery.com/jquery-3.3.1.slim.min.js');
    queue_js_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    queue_js_url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    queue_js_file(array('jquery-accessibleMegaMenu', 'minimalist', 'globals'));
    //queue_js_file(array('jquery-accessibleMegaMenu', 'popper.min', 'bootstrap.bundle.min','minimalist', 'globals'));
    //queue_js_file(array('minimalist'));
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

  <?php $navbar_background = null;?>

    <div id="wrap" >
        <header role="banner">

          <?php if(is_current_url('/')): ?>
            <?php
            if(get_theme_option('head_transparent') === '0'){
              if(get_theme_option('head_theme') === 'dark'){
                $navbar_background = 'bg-dark';
              }else if(get_theme_option('head_theme') === 'light'){
                $navbar_background = 'bg-light';
              }
            }
             ?>
            <nav class="navbar navbar-expand-md <?php echo (get_theme_option('head_theme') === 'dark'  ? 'navbar-dark': 'navbar-light'); ?> <?php echo $navbar_background; ?> py-3 fixed-top" <?php if (get_theme_option('head_transparent') === '1' ) echo 'data-transparent'; ?>  <?php echo (get_theme_option('head_theme') === 'dark' ? 'data-theme="dark"': 'data-theme="light"'); ?> >
          <?php else: ?>
            <nav class="navbar navbar-expand-md navbar-light bg-light py-3 fixed-top" >
          <?php endif; ?>
          <div class="row- w-100">
            <!-- NAVBAR BARRA SUPERIOR -->
            <div class="col-sm-12 pb-4 pb-md-0">
              <div class="row">
                <div class="col-sm-12 col-md-8">

                  <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
                  <?php echo link_to_home_page(option('site_title'), array('class'=>'navbar-brand', 'id' => 'site-title')); ?>

                </div>
                <!-- logo partial -->
                <div class="col-4 logos">
                  <div class="row">

                    <div class="col-4">
                      <a href="https://badac.uniandes.edu.co" target="_blank">
                        <?php
                          echo $this->partial('common/logo-l3a.svg');
                         ?>
                      </a>
                    </div>
                    <div class="col-4 offset-md-3">
                      <a href="https://badac.uniandes.edu.co" target="_blank">
                        <?php
                          echo $this->partial('common/logo-badac.svg');
                         ?>
                      </a>
                    </div>
                    <div class="col-6 col-md-4">
                      <a href="https://uniandes.edu.co" target="_blank">
                        <?php
                          echo $this->partial('common/logo-uniandes.svg');
                         ?>
                      </a>
                    </div>
                  </div>

                </div>
                <!-- end logo partial -->
              </div>
            </div>


                <!-- END NAVBAR BARRA SUPERIOR -->

              <!-- NAVBAR BARRA INFERIOR -->
                <div class="col-sm-12">

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                <div class="row collapse navbar-collapse justify-content-start" id="navbarSupportedContent" >


                  <div class="col-sm-12 col-md-8">
                      <?php
                        $partial = array('common/menu-partial.phtml', 'default');
                        $nav = public_nav_main();
                        $nav->setUlClass('navbar-nav float-right')->setPartial($partial);
                        echo $nav->render();
                      ?>
                  </div>
                  <div class="col-sm-8 col-md-4 d-flex justify-content-md-end justify-content-sm-start">
                      <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                      <?php echo navSearchForm(array('show_advanced' => true)); ?>
                      <?php else: ?>
                        <?php echo navSearchForm(); ?>
                      <?php endif; ?>
                  </div>
                </div>





            </div>

            <!-- END NAVBAR BARRA INFERIOR -->
          </div>
        </nav>
        </header>
        <?php if(get_theme_option('hero') && is_current_url('/') ): ?>
        <div class="jumbotron-fluid hero" style="background-image:url(<?php echo hero_image_path(); ?>);">
        </div>
      <?php endif; ?>

        <article id="content" role="main" tabindex="-1" class="container">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
