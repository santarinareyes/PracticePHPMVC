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
    <?php foreach($data["seasons"] as $season):?>
    <div class="season">
        <a href="">
            <h3>Season <?php echo $season->video_season;?></h3>
        </a>
        <div class="videos">
        <?php foreach($data["season_videos"] as $video):?>
            <?php if($video->video_season === $season->video_season):?>
                <a href="<?php echo URLROOT;?>/series/watch/<?php echo $video->video_id?>">
                <div class="episode_container">
                    <div class="contents">
                        <img src="<?php echo URLROOT; ?>/<?php echo $video->entity_thumbnail?>" alt="" title="<?php echo $video->entity_name?>">
                        <div class="video_info">
                            <h4><?php echo $video->video_episode . ". " .$video->video_title;?></h4>
                            <span><?php echo $video->video_description;?></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
    <?php endforeach;?>
    <div class="season">
            <h3>You might also like</h3>
        <div class="no_scroll">
        <?php foreach($data["suggested_videos"] as $video):?>
            <?php if($video->video_entity_id != $data["current_entity"]):?>
                <a href="<?php echo URLROOT;?>/series/watch/<?php echo $video->video_id?>">
                    <div class="episode_container">
                        <div class="contents">
                            <img src="<?php echo URLROOT; ?>/<?php echo $video->entity_thumbnail?>" alt="" title="<?php echo $video->entity_name?>">
                        </div>
                    </div>
                </a>
            <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>