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

        public function entity($id = ""){
            if(!empty($id)){

                $entity = $this->entityModel->getSingleEntity($id);
                $seasons = $this->entityModel->getSeasons($id);
                $season_videos = $this->entityModel->getSeasonVideos($id);
                
                $data = [
                    "entity" => $entity,
                    "seasons" => $seasons,
                    "season_videos" => $season_videos,
                ];
                
                $this->view("start/entity", $data);
            } else {
                redirect("start");
            }
        }
    }