<div class="watch_container">
    <div class="video_controls watch_nav">
        <button onclick="goBack()"><i class="fas fa-arrow-left" aria-hidden="true"></i></button>
        <h1><?php echo $data["video"]->video_title;?></h1>
    </div>
        <div class="video_controls up_next">
            <button onclick="restartVideo();"><i class="fas fa-redo" aria-hidden="true"></i></button>
            <div class="up_next_container">
                <h2>Up next:</h2>
                <h3><?php echo $data["next_episode"]->video_title;?></h3>
                <?php if($data["next_episode"]->video_isMovie == 0):?>
                <h3>Season <?php echo $data["next_episode"]->video_season;?>, Episode <?php echo $data["next_episode"]->video_episode;?></h3>
                <?php endif;?>
                <button <?php echo "onclick='playNext(" . $data["next_episode"]->video_id . ")'";?> class="play_next">
                    <i class="fas fa-play" aria-hidden="true"></i> Play
                </button>
            </div>
        </div>
    <video src="<?php echo URLROOT;?>/<?php echo $data["video"]->video_filePath;?>" type="video/mp4" controls autoplay muted></video>
<?php print_r ($data["next_episode"]);?>
<?php echo "</br>". $data["next_episode"]->video_id?>
</div>
<script>initVideo(<?php echo $data["video_id"] . ", " . $_SESSION["user_id"];?>)</script>