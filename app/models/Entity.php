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

        public function getCategories(){
            $this->db->query("SELECT * FROM categories c
                              INNER JOIN entities e on c.category_id = e.entity_category_id 
                              GROUP BY category_name");
            return $this->db->resultSet();
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
    }