<?php 
    class Entity {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getRandomEntity(){
            $this->db->query("SELECT * FROM entities
                              ORDER BY RAND() LIMIT 1");
                              
            return $this->db->single();
        }

        public function getSingleEntity($id){
            $this->db->query("SELECT * FROM entities WHERE entity_id = :id");
            $this->db->bind(":id", $id);

            return $this->db->single();
        }

        public function getAllEntities(){
            $this->db->query("SELECT * FROM entities");
            return $this->db->resultSet();
        }
        
        public function getSeasons($id){
            $this->db->query("SELECT * FROM videos 
                              WHERE video_entity_id = :id 
                              GROUP BY video_season 
                              ORDER BY video_season ASC");
            $this->db->bind(":id", $id);
            return $this->db->resultSet();
        }

        public function getSeasonVideos($id){
            $this->db->query("SELECT * FROM videos v 
                              INNER JOIN entities e ON v.video_entity_id = e.entity_id 
                              WHERE video_entity_id = :id 
                              ORDER BY video_season, video_episode ASC");
            $this->db->bind(":id", $id);
            return $this->db->resultSet();
        }

        public function getSuggestedVideos($id){
            $this->db->query("SELECT * FROM videos v 
                              INNER JOIN entities e ON v.video_entity_id = e.entity_id 
                              WHERE entity_category_id = (
                                    SELECT entity_category_id FROM entities 
                                    WHERE entity_id = :id) 
                              GROUP BY entity_id");
            $this->db->bind(":id", $id);
            return $this->db->resultSet();
        }
    }