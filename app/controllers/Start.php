<?php 
    class Start extends BaseController {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            }

            $this->entityModel = $this->model("Entity");
        }

        public function index(){
            $entity = $this->entityModel->getRandomEntity();

            $data = [
                "entity" => $entity,
            ];

            $this->view("start/index", $data);
        }
    }