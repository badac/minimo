<?php
  $files = $item->getFiles();

  $lista = array(
    "uno"=>"1",
    "dos"=>"2"
  );

  $tooltip_html = "
    Esta imagen está licenciada con la licencia Creative Commons 4.0 BY-NC.
  ";
 ?>


<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div class="row">

  <!-- item title -->
  <div class="col-sm-12">
    <h1 class="my-5 text-center"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
  </div>
  <!-- end item titl  e -->

  <!-- Item Viewer --->
  <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
  <div id="item-viewer" class="col-sm-12 item-viewer">
    <!-- File Carousel -->
    <div class="row-col">
    <div id="files-carousel" class="carousel slide" data-ride="carousel" data-interval="0">
      <div class="carousel-inner">
      <?php foreach ($files as $index=>$file): ?>
        <?php
          $active = "";
          if($index == 0){
            $active = "active";
          }
        ?>
        <div class="carousel-item <?php echo $active; ?>">
          <div class="row">
            <div class="col-sm-12">
              <a href="#" data-toggle="modal" data-target="#file-modal-<?php echo $index ?>">
                <img class="img-fluid img-preview" src="<?php echo file_display_url($file); ?>" alt="">
              </a>
            </div>
            <div class="col-sm-12">
              <div class="w-100 viewer-options ">
                <ul class="nav justify-content-end">
                 
                  <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#file-modal-<?php echo $index ?>" >
                      <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
            </div>
            </div>
          </div>


        </div>

        <?php endforeach; ?>
        </div>
      </div>
      </div>
      <!-- End File Carousel -->
        <div class="row">

          <!-- carousel thumbnails -->
          <?php if (sizeof($files) > 1): ?>
          <div class="col-sm-12">
              <ol class="carousel-indicators row justify-content-start">
              <?php $clase = "" ?>
              <?php foreach ($files as $index=>$file): ?>
                <div class="col-md-1 col-xs-4">
                  <?php
                  if ($index == 0):
                      $clase = "active";
                  endif;
                  ?>
                  <li data-target="#files-carousel" data-slide-to="<?php echo $index; ?>" class="<?php echo $clase; ?>">
                    <?php echo file_image('square_thumbnail', array('class' => 'thumbnail'), $file); ?>
                  </li>
                  </div>
              <?php endforeach; ?>
              </ol>
          </div>
          <?php endif; ?>
          <!-- carousel thumbnails -->
        </div>

      </div>
  <?php endif; ?>
  <!-- Item Viewer --->
  <!-- Metadata --->

  <div class="col-sm-12">
    <div class="ficha my-4">
      <h2 class="my-5">Detalles</h2>
      <?php echo all_element_texts('item'); ?>
    </div>
  </div>
    <!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
    <div class="col-sm-12">
      <div id="itemfiles" class="element">
          <h3><?php echo __('Files'); ?></h3>
          <div class="element-text"><?php echo files_for_item(); ?></div>
      </div>
    </div>
    <?php endif; ?>

        <!-- The following prints a list of all tags associated with the item -->
  <?php if (metadata('item', 'has tags')): ?>
    <div class="col-sm-12 border-bottom">
    <div id="item-tags" class="element my-4">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
  </div>

  <div class="col-sm-12">
      <h3>Nota de derechos</h3>
      <p class="disclaimer">
      Las imágenes, ilustraciones y similares, se utilizan sin ánimo de lucro y buena fe para ilustrar lo mencionado por el autor, con fines de enseñanza, difusión cultural y preservación, en la medida estrictamente necesaria para tal fin. Se reconoce el crédito correspondiente a sus autores.
      </p>
    </div>

  <div class="col-sm-12 border-bottom">
      <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
  </div>
    <?php endif;?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
  <?php if (metadata('item', 'Collection Name')): ?>
  <div class="col-sm-12 border-bottom">
    <div id="collection" class="element mt-4">
        <h3><?php echo __('Collection'); ?></h3>
        <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
    </div>
  </div>
  <?php endif; ?>



    <div class="col-sm-12 border-bottom">
      <div class="advanced-meta" id="advanced-metadata">
        <div class="advanced-meta-header">
          <h2>
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
              Más
            </button>
          </h2>
        </div>
        <div id="collapse1" class="collapse" aria-labelledby="headingOne" >
          <div class="advanced-meta-body my-4">
            <!-- The following prints a citation for this item. -->
            <div id="item-citation">
                <h3><?php echo __('Citation'); ?></h3>
                <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
            </div>

            <div id="item-output-formats">
                <h3><?php echo __('Output Formats'); ?></h3>
                <div class="element-text"><?php echo output_format_list(); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="col-sm-12">
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
  </div>

  <div class="col-sm-12">
    <nav>
      <ul class="item-pagination navigation mt-4">
          <li id="previous-item" class="previous"><?php echo link_to_previous_item_show($text = null, $props = array('class' => 'btn btn-outline-primary')); ?></li>
          <li id="next-item" class="next float-right"><?php echo link_to_next_item_show($text = null, $props = array('class' => 'btn btn-outline-primary')); ?></li>
      </ul>
    </nav>
  </div>

</div>


<?php echo foot(); ?>

<?php
  foreach($files as $index=>$file){
    $img_src = file_display_url($file);
    $object = array(
      "index"=> $index,
      "img_src"=> $img_src
    );
    echo $this->partial("common/show-item-modal.phtml", $object);
  }
?>
