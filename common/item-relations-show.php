
<?php if (!$subjectRelations && !$objectRelations): ?>
  <p><?php echo __('This item has no relations.'); ?></p>
  <?php else: ?>

<div id="item-relations-display-item-relations">


    <?php if ($subjectRelations): ?>
      <h2 class="mb-4">Referentes</h2>

      <div class="row">
      <?php foreach ($subjectRelations as $subjectRelation): ?>

        <?php
          $subject_item = get_record_by_id("Item", $subjectRelation['object_item_id']);
         ?>
           <div class="col-sm-12 col-md-3 mb-3">
             <div class="card border-0">
               <?php if ($subjectImage = record_image($subject_item, 'square_thumbnail', array('class'=>'card-img-top'))): ?>

                 <?php echo link_to_item($subjectImage, array('class' => 'card-link'), 'show',$subject_item); ?>
               <?php endif; ?>
               <div class="card-body px-0">
                 <a href="<?php echo url('items/show/' . $subjectRelation['object_item_id']); ?>">
                   <h5 class="card-title">
                     <?php echo $subjectRelation['object_item_title']; ?>
                   </h5>
                 </a>
               </div>
             </div>
           </div>
      <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($objectRelations): ?>
      <h2 class="mb-4">Obras</h2>
    <div class="row">
        <?php foreach ($objectRelations as $objectRelation): ?>

          <?php
            $object_item = get_record_by_id("Item", $objectRelation['subject_item_id']);
           ?>
             <div class="col-sm-12 col-md-3 mb-3">
               <div class="card border-0">
                 <?php if ($objectImage = record_image($object_item, 'square_thumbnail', array('class'=>'card-img-top'))): ?>

                   <?php echo link_to_item($objectImage, array('class' => 'card-link'), 'show',$object_item); ?>
                 <?php endif; ?>
                 <div class="card-body px-0">
                   <a href="<?php echo url('items/show/' . $objectRelation['subject_item_id']); ?>">
                     <h5 class="card-title">
                       <?php echo $objectRelation['subject_item_title']; ?>
                     </h5>

                   </a>
                 </div>
               </div>
             </div>

        <?php endforeach; ?>
      </div>
    <?php endif; ?>
</div>
<?php endif; ?>
