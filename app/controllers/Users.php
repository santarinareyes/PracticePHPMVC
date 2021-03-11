<?php 
    class Users extends BaseController{
        public function __construct()
        {
            $this->userModel = $this->model("User");
        }

        public function index(){
            
        }

        public function register(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    "firstname" => FormSanitizer::sanitizeString($_POST["firstname"]),
                    "lastname" => FormSanitizer::sanitizeString($_POST["lastname"]),
                    "username" => FormSanitizer::sanitizeUsername($_POST["username"]),
                    "email" => FormSanitizer::sanitizeEmail($_POST["email"]),
                    "confirm_email" => FormSanitizer::sanitizeEmail($_POST["confirm_email"]),
                    "password" => FormSanitizer::sanitizePassword($_POST["password"]),
                    "confirm_password" => FormSanitizer::sanitizePassword($_POST["confirm_password"]),
                ];
                
                $this->view("users/register", $data);

            } else {

                $data =[
                    "test" => "test"
                ];
                
                $this->view("users/register", $data);
            }
        }

        public function login(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    "firstname" => FormSanitizer::sanitizeString($_POST["firstname"]),
                    "lastname" => FormSanitizer::sanitizeString($_POST["lastname"]),
                    "username" => FormSanitizer::sanitizeUsername($_POST["username"]),
                    "email" => FormSanitizer::sanitizeEmail($_POST["email"]),
                    "confirm_email" => FormSanitizer::sanitizeEmail($_POST["confirm_email"]),
                    "password" => FormSanitizer::sanitizePassword($_POST["password"]),
                    "confirm_password" => FormSanitizer::sanitizePassword($_POST["confirm_password"]),
                ];
                
                $this->view("users/login", $data);

            } else {

                $data =[
                    "test" => "test"
                ];
                
                $this->view("users/login", $data);
            }
        }
    }