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

            <div class="row w-100">
              <div class="col-sm-12 col-md-4">
                <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
                <?php echo link_to_home_page(option('site_title'), array('class'=>'navbar-brand', 'id' => 'site-title')); ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="col-sm-12 col-md-8 d-flex align-items-center justify-content-around">
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <?php
                      $partial = array('common/menu-partial.phtml', 'default');
                      $nav = public_nav_main();
                      $nav->setUlClass('navbar-nav float-right')->setPartial($partial);
                      echo $nav->render();
                    ?>

                    <button type="button" name="button" class="btn btn-outline" data-toggle="collapse" href="#navbar-search" >
                      <i class="fa fa-search"></i>
                    </button>



                    <ul class="logos d-flex justify-content-around align-items-center">
                      <li class="mx-4">
                        <a href="https://badac.uniandes.edu.co" target="_blank">
                        <!-- LOGO BADAC -->


                        <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        	 viewBox="0 0 2969.2 333.6" style="enable-background:new 0 0 2969.2 333.6;" xml:space="preserve">

                           <style type="text/css">
                           	.st0{fill:none;}
                           </style>

                        <g id="uniandes">
                        	<g>
                        		<g>
                        			<g>
                        				<path class="st0" d="M2137.8,274.8c-47.2,30.6-96.2,28.9-96.2,28.9s-1.3-6.3-0.8-17c0.5-10.8,6.4-7.8,10.7-16.3
                        					c1.5-3.1,2.9-5.2,5.3-12.5c0.1-0.3-2.8-52-3.6-73.9c-0.4-11.8-2.6-31.5-5.2-50.7c-1.5-11.4-5-20.4-6.6-31.1
                        					c-2.3-15.6-5-33.1-5-33.1c-1.9,5-4.7,23.5-7.4,44.4c-1.3,10.1-2.7,20.7-3.9,30.6c-2.6,21-9.2,77.1-10.2,80.2
                        					c-1.5,4.6-1.7-1.2-1.7-1.2s3.9-58.9,5-84.7c0.6-12.6,1.5-26.5,3.1-39.8c1.2-10,2.7-19.7,4.7-28.3c0,0,6.7-20.4,8.9-20.8
                        					c2.2-0.4,9.9,12.9,12.6,24.6c6,26.6,9.5,30,14,58c4.3,26.6,8.3,48.8,8.8,52.4c1.9,13.2,1,54.3-2.3,70.7c-0.8,4.5-1,6.1-3.9,9.1
                        					c-6.9,6.9-11.7,15.2-11.7,20.6c0,5.4-0.9,5.3,0.4,8.4c0,0,9,13.5,60.9-17.4c0,0,16.2-8.5,16.2-27.2V59.1c0,0-51.4-17.4-91-17.4
                        					c-39.6,0-89.2,17.3-89.2,17.3v188.7c0,11.6,1.7,32.6,18.3,40c0,0-44.2-14.3-44.2-40.2V43.1c0,0,67.4-12.4,115.1-12.4
                        					c47.7,0,116.3,12.4,116.3,12.4v204.7C2155.1,265.4,2137.8,274.8,2137.8,274.8"/>
                        			</g>
                        			<g>
                        				<path class="st0" d="M2281.8,216c-11.4,6.1-26,9.1-43.8,9.1c-29.5,0-44.3-12.8-44.3-38.5v-77.9h25.8V188
                        					c0,12.9,6.4,19.3,19.3,19.3c7,0,12.8-1.3,17.2-3.8v-94.9h25.8V216z"/>
                        				<path class="st0" d="M2394.1,222.8h-25.8v-81c0-12.7-6.9-19.1-20.6-19.1c-6.5,0-12.5,1.1-17.8,3.2v96.9H2304v-108
                        					c11.7-5.5,26.6-8.3,44.7-8.3c16,0,27.8,3.5,35.4,10.6c6.6,5.9,9.9,14,9.9,24.4V222.8z"/>
                        				<path class="st0" d="M2444.3,76.1c0,3.5-1.4,6.5-4.1,9c-2.8,2.5-6.1,3.7-10.1,3.7c-4,0-7.3-1.2-10.1-3.7c-2.8-2.5-4.1-5.5-4.1-9
                        					c0-3.6,1.4-6.6,4.1-9.1c2.7-2.5,6.1-3.8,10.1-3.8c3.9,0,7.3,1.2,10.1,3.7C2442.9,69.4,2444.3,72.5,2444.3,76.1 M2442.9,222.8
                        					h-25.8V108.6h25.8V222.8z"/>
                        				<path class="st0" d="M2548.6,216.7c-10.3,5.5-24.1,8.3-41.3,8.3c-31.1,0-46.6-11.6-46.6-34.7c0-13.8,6.3-24.2,18.8-31.1
                        					c9.9-5.4,24.9-9,44.9-11v-6.1c0-12.6-7.6-18.9-22.7-18.9c-9.4,0-19,2.3-28.6,7l-5.9-14.8c11.9-5.8,24.9-8.7,39.2-8.7
                        					c28.1,0,42.2,13.2,42.2,39.4V216.7z M2524.4,207.4v-47.1c-13.5,1.7-23.2,4.3-28.8,7.8c-7,4.4-10.6,11.5-10.6,21.2
                        					c0,14.2,8,21.2,23.9,21.2C2515,210.5,2520.2,209.5,2524.4,207.4"/>
                        				<path class="st0" d="M2660.8,222.8H2635v-81c0-12.7-6.9-19.1-20.6-19.1c-6.5,0-12.5,1.1-17.8,3.2v96.9h-25.8v-108
                        					c11.7-5.5,26.6-8.3,44.7-8.3c16,0,27.8,3.5,35.4,10.6c6.6,5.9,10,14,10,24.4V222.8z"/>
                        				<path class="st0" d="M2772,216.7c-9.9,5.5-23.2,8.3-39.8,8.3c-16.8,0-29.9-5.1-39.2-15.3c-9.3-10.2-14-24.4-14-42.6
                        					c0-18.4,4.7-33,14-43.9c9-10.4,21.1-15.7,36.1-15.7c6.7,0,12.4,0.7,17.2,2.1V63.4h25.8V216.7z M2746.2,205.9v-82.2
                        					c-3.4-1-7.2-1.5-11.4-1.5c-20.1,0-30.1,14.5-30.1,43.4c0,28.5,9.4,42.8,28.2,42.8C2739.1,208.4,2743.6,207.5,2746.2,205.9"/>
                        				<path class="st0" d="M2884.4,165l-69.9,10.2c2.1,21.2,12.5,31.8,31.1,31.8c11,0,20.6-2.1,28.8-6.4l6.1,16.3
                        					c-9.7,5.4-22.3,8.1-37.7,8.1c-16.4,0-29.3-5.2-38.8-15.5c-9.4-10.3-14.2-25-14.2-44.1c0-18.5,4.3-32.9,13-43.3
                        					c8.7-10.4,20.6-15.6,35.7-15.6c15.3,0,26.8,5,34.8,14.9C2881.3,131.4,2885,145.9,2884.4,165 M2860.2,154.8
                        					c0-21.6-7.5-32.4-22.4-32.4c-7.9,0-14,3.2-18.2,9.5c-4.7,6.9-6.8,16.9-6.6,30.1L2860.2,154.8z"/>
                        				<path class="st0" d="M2967.8,190c0,9.6-3.7,17.8-11.2,24.6c-7.5,6.8-17.3,10.1-29.4,10.1c-13,0-23.5-2.8-31.5-8.3l6.8-16.5
                        					c5.5,4.3,12.6,6.5,21.4,6.5c5.2,0,9.5-1.5,12.7-4.6c3.3-3,4.9-6.9,4.9-11.5c0-4.8-1.3-8.6-3.8-11.3c-2.5-2.8-6.8-5.2-12.9-7.5
                        					c-17.4-6.6-26-17.3-26-32c0-9.3,3.4-17.1,10.1-23.5c6.7-6.4,15.4-9.5,26.2-9.5c11.6,0,21.5,2.7,29.7,8l-6.4,15
                        					c-5.2-4.2-11.3-6.3-18.2-6.3c-5.1,0-9.1,1.4-12,4.3c-2.9,2.9-4.3,6.5-4.3,10.7c0,7.5,5.6,13.5,16.9,18
                        					C2958.7,163.6,2967.8,174.9,2967.8,190"/>
                        			</g>
                        		</g>
                        	</g>
                        </g>
                        <g id="C">
                        </g>
                        <g id="A_1_">
                        </g>
                        <g id="D">
                        </g>
                        <g id="A">
                        </g>
                        <g id="B">
                        </g>
                        <g id="_x35_">
                        </g>
                        <g id="_x34_">
                        </g>
                        <g id="_x33_">
                        </g>
                        <g id="_x32_">
                        </g>
                        <g id="_x31_">
                        	<g>
                        		<g>
                        			<path class="st0" d="M1633,122.6c-24.3-15.7-60.8-1.1-60.8,32.5c0,35.2,38.7,49.3,62.3,31.4l16.1,18.4c-11.2,9.3-25.7,15-41.4,15
                        				c-35.7,0-64.8-29.1-64.8-64.8c0-35.7,29.1-64.8,64.8-64.8c15,0,28.9,5.2,40,13.7L1633,122.6z"/>
                        		</g>
                        		<g>
                        			<path class="st0" d="M1266.1,194.1h-51.7l-11.8,23.2h-28l63.7-125.2h7.3l59.1,125.2H1277L1266.1,194.1z M1254.3,169.1l-13-27.9
                        				l-14.1,27.9H1254.3z"/>
                        		</g>
                        		<g>
                        			<path class="st0" d="M868.4,92.1c8.4,0,16.6,1.6,24.3,4.8c7.5,3.2,14.1,7.7,19.8,13.4c5.9,5.9,10.3,12.5,13.4,20
                        				c3.4,7.7,5,15.9,5,24.3c0,8.6-1.6,16.8-5,24.5c-3,7.5-7.5,14.1-13.4,19.8c-5.7,5.7-12.3,10.4-19.8,13.4c-7.7,3.4-15.9,5-24.3,5
                        				h-25.2v-0.2h-10.2v-125H868.4z M868.4,192.3c20.7,0,37.5-17,37.5-37.7c0-20.7-16.8-37.5-37.5-37.5h-10.3v75.2H868.4z"/>
                        		</g>
                        		<g>
                        			<path class="st0" d="M550.8,194.2h-51.7l-11.8,23.2h-28L523,92.2h7.3l59.1,125.2h-27.7L550.8,194.2z M539,169.2l-13-27.9
                        				l-14.1,27.9H539z"/>
                        		</g>
                        		<g>
                        			<path class="st0" d="M161.3,92.4c20.2,0,36.6,16.4,36.6,36.6c0,7.7-2.3,14.6-6.4,20.5c9.1,7,14.8,17.9,14.8,30
                        				c0,21.1-16.9,37.9-37.8,37.9h-41.2v-125H161.3z M160.2,141.9c7,0,14.5-5.7,14.5-14.5s-7.5-14.1-14.5-14.1h-10.9v28.6H160.2z
                        				 M168.1,196.2c8.4,0,15.3-6.6,15.3-15c0-8.4-7-15.2-15.3-15.2h-18.2v30.2H168.1z"/>
                        		</g>
                        		<path class="st0" d="M1764.2,0.6h-333.5V334l0,0h333.5l0,0L1764.2,0.6L1764.2,0.6z M1724.5,240.8h-261.2V68.2h261.2V240.8z"/>
                        		<path class="st0" d="M1406.3,0.4h-333.5v333.5l0,0h333.5l0,0L1406.3,0.4L1406.3,0.4z M1366.7,240.6h-261.2V68.1h261.2V240.6z"/>
                        		<path class="st0" d="M1048.7,0.4H715.2v333.5l0,0h333.5l0,0L1048.7,0.4L1048.7,0.4z M1009.1,240.6H747.9V68.1h261.2V240.6z"/>
                        		<path class="st0" d="M691,0.6H357.6V334l0,0H691l0,0L691,0.6L691,0.6z M651.4,240.8H390.2V68.2h261.2V240.8z"/>
                        		<path class="st0" d="M333.5,0.6H0V334l0,0h333.5l0,0L333.5,0.6L333.5,0.6z M293.8,240.8H32.6V68.2h261.2V240.8z"/>
                        	</g>
                        </g>
                        </svg>

                          <!-- END LOGO UNIANDES -->
                        </a>
                      </li>
                    </ul>
                </div>
              </div>
              <div class="col-sm-12 collapse" id="navbar-search">
                <form class="form-inline my-2  mx-5">
                  <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                  <?php echo search_form(array('show_advanced' => true)); ?>
                  <?php else: ?>
                  <?php echo search_form(); ?>
                  <?php endif; ?>
                </form>
              </div>
            </div>

                </nav>
        </header>
        <?php if(get_theme_option('hero') && is_current_url('/') ): ?>
        <div class="jumbotron-fluid hero" style="background-image:url(<?php echo hero_image_path(); ?>);">
        </div>
      <?php endif; ?>

        <article id="content" role="main" tabindex="-1" class="container">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
