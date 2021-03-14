<?php 
    class Start extends BaseController {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            }

            $this->entityModel = $this->model("Entity");
            $this->categoryModel = $this->model("Category");
        }

        public function index(){
            $randomEntity = $this->entityModel->getRandomEntity();
            $categories = $this->categoryModel->getCategories();
            $allEntities = $this->entityModel->getAllEntities();
            
            $data = [
                "user_id" => $_SESSION["user_id"],
                "random_entity" => $randomEntity,
                "categories" => $categories,
                "all_entities" => $allEntities,
                "resume_entity" => "",
            ];

            $resumeEntity = $this->entityModel->getUsersEntityInfo($data);
            $data["resume_entity"] = $resumeEntity;
            
            $this->view("start/index", $data);
        }
    }