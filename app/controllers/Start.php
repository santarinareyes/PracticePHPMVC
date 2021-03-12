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

            for ($i = 0; $i < count($categories); $i++){
                $entities = $this->entityModel->getEntities($categories[$i]->category_id);
            }
            
            $data = [
                "randomEntity" => $randomEntity,
                "categories" => $categories,
                "entities" => $entities,
            ];
            
            $this->view("start/index", $data);
        }
    }