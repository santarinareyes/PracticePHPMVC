<?php 
    class Entity {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getRandomEntity(){
            $this->db->query("SELECT * FROM entities e
                              INNER JOIN videos v on e.entity_id = v.video_entity_id 
                              ORDER BY RAND() LIMIT 1");
                              
            return $this->db->single();
        }

        public function getSingleEntity($id){
            $this->db->query("SELECT * FROM entities WHERE entity_id = :id");
            $this->db->bind(":id", $id);

            return $this->db->single();
        }

        public function getAllEntities(){
            $this->db->query("SELECT * FROM entities e 
                              INNER JOIN videos v ON e.entity_id = v.video_entity_id 
                              GROUP BY e.entity_name");
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
                                    WHERE entity_id = :id
                                    ) 
                              GROUP BY entity_id");
            $this->db->bind(":id", $id);
            return $this->db->resultSet();
        }

        public function getUsersEntityInfo($data){
            $this->db->query("SELECT vp.video_progress, vp.video_id, v.video_season, v.video_episode FROM videoprogress vp 
                              INNER JOIN videos v ON vp.video_id = v.video_id 
                              WHERE v.video_entity_id = :video_entity_id 
                              AND vp.user_id = :user_id 
                              ORDER BY vp.date_modified DESC 
                              LIMIT 1");
            $this->db->bind(":video_entity_id", $data["random_entity"]->entity_id);
            $this->db->bind(":user_id", $data["user_id"]);
            $this->db->execute();

            if($this->db->rowCount() == 0){
                $this->db->query("SELECT video_id, video_season, video_episode FROM videos 
                                  WHERE video_entity_id = :video_entity_id 
                                  ORDER BY video_season, video_episode ASC 
                                  LIMIT 1");
                $this->db->bind(":video_entity_id", $data["random_entity"]->entity_id);
                return $this->db->single();
            } else {
                return $this->db->single();
            }
        }

        public function getUsersLastViewed($data){
            $this->db->query("SELECT v.video_isMovie, vp.video_progress, vp.video_id, v.video_season, v.video_episode FROM videoprogress vp 
                              INNER JOIN videos v ON vp.video_id = v.video_id 
                              WHERE v.video_entity_id = :video_entity_id 
                              AND vp.user_id = :user_id 
                              ORDER BY vp.date_modified DESC 
                              LIMIT 1");
            $this->db->bind(":video_entity_id", $data["entity"]->entity_id);
            $this->db->bind(":user_id", $data["user_id"]);
            $this->db->execute();

            if($this->db->rowCount() == 0){
                $this->db->query("SELECT video_id, video_season, video_episode FROM videos 
                                  WHERE video_entity_id = :video_entity_id 
                                  ORDER BY video_season, video_episode ASC 
                                  LIMIT 1");
                $this->db->bind(":video_entity_id", $data["current_entity"]);
                return $this->db->single();
            } else {
                return $this->db->single();
            }
        }

        public function getRandomSeries() {
            $this->db->query("SELECT * FROM entities e 
                              INNER JOIN videos v on e.entity_id = v.video_entity_id 
                              WHERE v.video_isMovie = 0 
                              ORDER BY RAND() LIMIT 1");
            return $this->db->single();
        }

        public function getSeriesEntities(){
            $this->db->query("SELECT * FROM entities e 
                              INNER JOIN videos v on e.entity_id = v.video_entity_id 
                              WHERE v.video_isMovie = 0 
                              GROUP BY e.entity_name");
            return $this->db->resultSet();
        }

        public function getRandomMovie() {
            $this->db->query("SELECT * FROM entities e 
                              INNER JOIN videos v on e.entity_id = v.video_entity_id 
                              WHERE v.video_isMovie = 1 
                              ORDER BY RAND() LIMIT 1");
            return $this->db->single();
        }

        public function getMovieEntities(){
            $this->db->query("SELECT * FROM entities e 
                              INNER JOIN videos v on e.entity_id = v.video_entity_id 
                              WHERE v.video_isMovie = 1 
                              GROUP BY e.entity_name");
            return $this->db->resultSet();
        }
    }