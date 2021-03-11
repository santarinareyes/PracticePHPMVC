<?php 
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function register($data){
            $this->db->query("INSERT INTO users (
                              user_firstname, user_lastname, username, user_email, user_password)
                              VALUES (:firstname, :lastname, :username, :email, :password)");
            $this->db->bind(":firstname", $data["firstname"]);
            $this->db->bind(":lastname", $data["lastname"]);
            $this->db->bind(":username", $data["username"]);
            $this->db->bind(":email", $data["email"]);
            $this->db->bind(":password", $data["password"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }