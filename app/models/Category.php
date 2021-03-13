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
    }