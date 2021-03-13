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
            $randomEntity = $this->entityModel->getRandomEntity();
            $categories = $this->entityModel->getCategories();
            $allEntities = $this->entityModel->getAllEntities();
            
            $data = [
                "random_entity" => $randomEntity,
                "categories" => $categories,
                "all_entities" => $allEntities,
            ];
            
            $this->view("start/index", $data);
        }
    }