<?php
    class Video {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getSingleVideo($id){
            $this->db->query("SELECT * FROM videos
                              WHERE video_id = :id");
            $this->db->bind(":id", $id);
            return $this->db->single();
        }

        public function updateViewCount($id){
            $this->db->query("UPDATE videos SET video_views = video_views+1
                              WHERE video_id = :id");
            $this->db->bind(":id", $id);
            return $this->db->execute();
        }

        public function getNextEpisode($data){
            $this->db->query("SELECT * FROM videos 
                              WHERE video_entity_id = :video_entity_id AND video_id != :video_id 
                              AND (
                                  (video_season = :video_season AND video_episode > :video_episode) 
                                  OR video_season > :video_season
                                  )
                              ORDER BY video_season, video_episode ASC LIMIT 1");
            $this->db->bind(":video_entity_id", $data["video"]->video_entity_id);
            $this->db->bind(":video_id", $data["video"]->video_id);
            $this->db->bind(":video_season", $data["video"]->video_season);
            $this->db->bind(":video_episode", $data["video"]->video_episode);
            $this->db->execute();

            // Get the most popular video if nothing returned 
            if($this->db->rowCount() == 0){
                $this->db->query("SELECT * FROM videos 
                                  WHERE video_season <= 1 AND video_episode <= 1 
                                  AND video_id != :video_id 
                                  ORDER BY video_views DESC LIMIT 1");
                $this->db->bind(":video_id", $data["video"]->video_id);
                return $this->db->single();
            
            } else {
                return $this->db->single();
            }
        }
    }