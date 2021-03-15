<?php 
    class Category {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getCategories(){
            $this->db->query("SELECT * FROM categories c
                              INNER JOIN entities e on c.category_id = e.entity_category_id 
                              GROUP BY category_name");
            return $this->db->resultSet();
        }

        public function getSeriesCategories(){
            $this->db->query("SELECT * FROM categories c 
                              INNER JOIN entities e ON c.category_id = e.entity_category_id 
                              INNER JOIN videos v ON e.entity_id = v.video_entity_id 
                              WHERE v.video_isMovie = 0 
                              GROUP BY category_name");
            return $this->db->resultSet();
        }

        public function getMovieCategories(){
            $this->db->query("SELECT * FROM categories c 
                              INNER JOIN entities e ON c.category_id = e.entity_category_id 
                              INNER JOIN videos v ON e.entity_id = v.video_entity_id 
                              WHERE v.video_isMovie = 1 
                              GROUP BY category_name");
            return $this->db->resultSet();
        }
    }