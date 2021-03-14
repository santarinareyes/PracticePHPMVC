<?php 
    require_once "../../app/config/config.php";
    require_once "../../app/libraries/Database.php";

    if(isset($_POST["video_id"]) && isset($_POST["user_id"])){
        $db = new Database;
        
        $db->query("UPDATE videoProgress SET video_finished = 1, video_progress = 0 
                    WHERE user_id = :user_id AND video_id = :video_id");
        $db->bind(":user_id", $_POST["user_id"]);
        $db->bind(":video_id", $_POST["video_id"]);

        $db->execute();
        
    } else {
        echo "No video_id or user_id";
    }