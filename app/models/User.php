<?php 
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function findUserByUsername($username){
            $this->db->query("SELECT * FROM users WHERE username = :username");
            $this->db->bind(":username", $username);

            if($this->db->single()){
                return true;
            } else {
                return false;
            }
        }

        public function findUserByEmail($email){
            $this->db->query("SELECT * FROM users WHERE user_email = :user_email");
            $this->db->bind(":user_email", $email);

            if($this->db->single()){
                return true;
            } else {
                return false;
            }
        }

        public function login($data){
            $this->db->query("SELECT * FROM users where username = :username");
            $this->db->bind(":username", $data["username"]);

            $row = $this->db->single();
            $hashed_password = $row->user_password;

            if(password_verify($data["password"], $hashed_password)){
                return $row;
            } else {
                return false;
            }
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