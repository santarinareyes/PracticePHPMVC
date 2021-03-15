<?php 
    class Movies extends BaseController {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            }

            $this->entityModel = $this->model("Entity");
            $this->categoryModel = $this->model("Category");
            $this->videoModel = $this->model("Video");
        }

        public function index(){
            $random_entity = $this->entityModel->getRandomMovie();
            $categories = $this->categoryModel->getMovieCategories();
            $allEntities = $this->entityModel->getMovieEntities();
            
            $data = [
                "user_id" => $_SESSION["user_id"],
                "random_entity" => $random_entity,
                "categories" => $categories,
                "all_entities" => $allEntities,
                "resume_entity" => "",
            ];

            $data["resume_entity"] = $this->entityModel->getUsersEntityInfo($data);
            
            $this->view("movies/index", $data);
        }
    }