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
<div class="preview_categories">
    <?php foreach($data["seasons"] as $season):?>
    <div class="category">
        <a href="">
            <h3>Season <?php echo $season->video_season;?></h3>
        </a>
    </div>
    <div class="entities">
        <?php foreach($data["season_videos"] as $video):?>
            <?php if($video->video_season === $season->video_season):?>
                <a href="">
                    <div class="preview_container small">
                        <img src="<?php echo URLROOT; ?>/<?php echo $video->entity_thumbnail?>" alt="" title="<?php echo $video->entity_name?>">
                    </div>
                </a>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <?php endforeach;?>
</div>