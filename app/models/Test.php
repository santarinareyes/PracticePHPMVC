<?php 
    class Test {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getUser(){
            $this->db->query("SELECT * FROM test");
            
            return $this->db->single();

        }
    }