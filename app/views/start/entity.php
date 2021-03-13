<div class="preview_container">
    <img class="preview_image" src="<?php echo URLROOT; ?>/<?php echo $data["entity"]->entity_thumbnail; ?>" alt="" hidden>
    <video class="preview_video" src="<?php echo URLROOT; ?>/<?php echo $data["entity"]->entity_preview; ?>" autoplay muted onended="previewEnded()"></video>

    <div class="preview_overlay">
        <div class="main_details">
            <h3><?php echo $data["entity"]->entity_name; ?></h3>
            <div class="buttons">
                <button><i class="fas fa-play"></i> Play</button>
                <button onclick="volumeToggle(this)"><i class="fas fa-volume-mute"></i></button>
            </div>
        </div>
    </div>
</div>