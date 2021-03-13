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
            $this->db->query("SELECT * FROM categories c
                              INNER JOIN entities e on c.category_id = e.entity_category_id 
                              GROUP BY category_name");
            return $this->db->resultSet();
        }

        public function getAllEntities(){
            $this->db->query("SELECT * FROM entities");
            return $this->db->resultSet();
        }
    }