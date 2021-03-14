<div class="watch_container">
    <div class="video_controls watch_nav">
        <button onclick="goBack()"><i class="fas fa-arrow-left" aria-hidden="true"></i></button>
        <h1><?php echo $data["video"]->video_title;?></h1>
    </div>
    <video src="<?php echo URLROOT;?>/<?php echo $data["video"]->video_filePath;?>" type="video/mp4" controls autoplay muted></video>
<?php print_r ($data["next_episode"]);?>
</div>
<script>initVideo(<?php echo $data["video_id"] . ", " . $_SESSION["user_id"];?>)</script>