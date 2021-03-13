<div class="watch_container">
    <div class="video_controls watch_nav">
        <button><i class="fas fa-arrow-left"></i></button>
        <h1><?php echo $data["video"]->video_title;?></h1>
    </div>
    <video src="<?php echo URLROOT;?>/<?php echo $data["video"]->video_filePath;?>" type="video/mp4" controls autoplay muted></video>
</div>