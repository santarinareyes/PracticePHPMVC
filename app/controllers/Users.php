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
                    "firstname" => trim($_POST["firstname"]),
                    "lastname" => trim($_POST["lastname"]),
                    "username" => trim($_POST["username"]),
                    "email" => trim($_POST["email"]),
                    "confirm_email" => trim($_POST["confirm_email"]),
                    "password" => trim($_POST["password"]),
                    "confirm_password" => trim($_POST["confirm_password"]),
                ];
                
                $this->view("users/register", $data);

            } else {

                $data =[
                    "test" => "test"
                ];
                
                $this->view("users/register", $data);
            }
        }
    }