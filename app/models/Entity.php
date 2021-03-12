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

        public function getCategories(){
            $this->db->query("SELECT * FROM categories");
            return $this->db->resultSet();
        }

        public function getEntities($category_id){
            $this->db->query("SELECT * FROM entities WHERE entity_category_id = $category_id");
            return $this->db->resultSet();
        }
    }