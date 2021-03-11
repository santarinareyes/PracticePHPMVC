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

                $data = [
                    "firstname" => FormSanitizer::sanitizeString($_POST["firstname"]),
                    "lastname" => FormSanitizer::sanitizeString($_POST["lastname"]),
                    "username" => FormSanitizer::sanitizeUsername($_POST["username"]),
                    "email" => FormSanitizer::sanitizeEmail($_POST["email"]),
                    "confirm_email" => FormSanitizer::sanitizeEmail($_POST["confirm_email"]),
                    "password" => FormSanitizer::sanitizePassword($_POST["password"]),
                    "confirm_password" => FormSanitizer::sanitizePassword($_POST["confirm_password"]),
                    "firstname_err" => "",
                    "lastname_err" => "",
                    "username_err" => "",
                    "email_err" => "",
                    "password_err" => "",
                    "confirm_email_err" => "",
                    "confirm_password_err" => "",
                ];

                if($this->userModel->findUserByUsername($data["username"])){
                    $data["username_err"] = Constants::$regEmailErr2;
                }

                if($this->userModel->findUserByEmail($data["email"])){
                    $data["email_err"] = Constants::$regEmailErr2;
                }

                $data["firstname_err"] = FormValidator::validateString($data["firstname"]);
                $data["lastname_err"] = FormValidator::validateString($data["firstname"]);
                $data["confirm_email_err"] = FormValidator::validateConfirmEmail($data["email"], $data["confirm_email"]);
                $data["password_err"] = FormValidator::validatePassword($data["password"]);
                $data["confirm_password_err"] = FormValidator::validateConfirmPassword($data["password"], $data["confirm_password"]);

                $this->view("users/register", $data);

                if(empty($data["firstname_err"]) && empty($data["lastname_err"]) && empty($data["username_err"]) && empty($data["email_err"]) && empty($data["password_err"]) && empty($data["confirm_email_err"]) && empty($data["confirm_password_err"])){
                    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                    if($this->userModel->register($data)){
                        header("location:" . URLROOT . "/users/login");
                    } else {
                        die("Something went wrong");
                    }
                }

            } else {

                $data = [
                    "firstname" => "",
                    "lastname" => "",
                    "username" => "",
                    "email" => "",
                    "confirm_email" => "",
                    "password" => "",
                    "firstname_err" => "",
                    "lastname_err" => "",
                    "username_err" => "",
                    "email_err" => "",
                    "password_err" => "",
                    "confirm_email_err" => "",
                    "confirm_password_err" => "",
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