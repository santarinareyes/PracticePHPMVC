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
    }