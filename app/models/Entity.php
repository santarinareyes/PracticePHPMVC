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
    }