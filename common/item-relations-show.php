


<div id="item-relations-display-item-relations">
    <h2 class="mb-4"><?php echo __('Item Relations'); ?></h2>
    <?php if (!$subjectRelations && !$objectRelations): ?>
    <p><?php echo __('This item has no relations.'); ?></p>
    <?php else: ?>


      <div class="card-columns">
      <?php foreach ($subjectRelations as $subjectRelation): ?>

        <?php
          $subject_item = get_record_by_id("Item", $subjectRelation['object_item_id']);
         ?>
          <div class="card border-1">
            <?php if ($subjectImage = record_image($subject_item, 'thumbnail', array('class'=>'card-img-top'))): ?>

              <?php echo link_to_item($subjectImage, array('class' => 'card-link'), 'show',$subject_item); ?>
            <?php endif; ?>
            <div class="card-body">
              <a href="<?php echo url('items/show/' . $subjectRelation['object_item_id']); ?>">
                <h5 class="card-title">
                  <?php echo $subjectRelation['object_item_title']; ?>
                </h5>
                </a>

                <dl class="row-col">
                  <dt>Relación:</dt>
                  <dd><?php echo $subjectRelation['relation_text']; ?></dd>
                </dl>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
    <div class="card-columns">

      <?php foreach ($objectRelations as $objectRelation): ?>

        <?php
          $object_item = get_record_by_id("Item", $objectRelation['subject_item_id']);
         ?>
             <div class="card border-1">
               <?php if ($objectImage = record_image($object_item, 'thumbnail', array('class'=>'card-img-top'))): ?>

                 <?php echo link_to_item($objectImage, array('class' => 'card-link'), 'show',$object_item); ?>
               <?php endif; ?>
               <div class="card-body">
                 <a href="<?php echo url('items/show/' . $objectRelation['subject_item_id']); ?>">
                   <h5 class="card-title">
                     <?php echo $objectRelation['subject_item_title']; ?>
                   </h5>
                   </a>
                   <dl class="row-col">
                     <dt>Relación:</dt>
                     <dd><?php echo $objectRelation['relation_text']; ?></dd>
                   </dl>                 
               </div>
             </div>

      <?php endforeach; ?>
    </div>

    <?php endif; ?>
</div>
