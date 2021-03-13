<div class="preview_container">
    <img class="preview_image" src="<?php echo $data["random_entity"]->entity_thumbnail; ?>" alt="" hidden>
    <video class="preview_video" src="<?php echo $data["random_entity"]->entity_preview; ?>" autoplay muted onended="previewEnded()"></video>

    <div class="preview_overlay">
        <div class="main_details">
            <h3><?php echo $data["random_entity"]->entity_name; ?></h3>
            <div class="buttons">
                <button><i class="fas fa-play"></i> Play</button>
                <button onclick="volumeToggle(this)"><i class="fas fa-volume-mute"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="preview_categories">
    <?php foreach($data["categories"] as $category):?>
    <div class="category">
        <a href="<?php echo URLROOT?>/category/<?php echo $category->category_id?>">
            <h3><?php echo $category->category_name;?></h3>
        </a>
    </div>
    <div class="entities">
        <?php foreach($data["all_entities"] as $entity):?>
            <?php if($entity->entity_category_id === $category->category_id):?>
                <a href="<?php echo URLROOT;?>/start/entity/<?php echo $entity->entity_id?>">
                    <div class="preview_container small">
                        <img src="<?php echo $entity->entity_thumbnail?>" alt="" title="<?php echo $entity->entity_name?>">
                    </div>
                </a>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <?php endforeach;?>
</div>