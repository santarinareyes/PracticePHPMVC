<?php 
    class Users extends BaseController{
        public function __construct()
        {
            
        }

        public function index(){
            
        }

        public function register(){
            
            $data =[
                "test" => "test"
            ];

            $this->view("users/register", $data);
        }
    }