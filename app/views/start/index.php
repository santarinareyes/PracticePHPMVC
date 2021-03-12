<div class="preview_container">
    <img class="preview_image" src="<?php echo $data["randomEntity"]->entity_thumbnail; ?>" alt="" hidden>
    <video class="preview_video" src="<?php echo $data["randomEntity"]->entity_preview; ?>" autoplay muted onended="previewEnded()"></video>

    <div class="preview_overlay">
        <div class="main_details">
            <h3><?php echo $data["randomEntity"]->entity_name; ?></h3>
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
        <?php echo $category->category_name;?>
    </div>
    <?php endforeach;?>
    <?php foreach($data["entities"] as $entity):?>
        <?php echo $entity->entity_thumbnail?>
    <?php endforeach;?>
</div>