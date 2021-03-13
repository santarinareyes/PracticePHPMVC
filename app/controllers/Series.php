<?php 
    class Series extends BaseController {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            }

            $this->entityModel = $this->model("Entity");
            $this->categoryModel = $this->model("Category");
        }

        public function index(){
            redirect("start");
        }

        public function seasons($id = ""){
            if(!empty($id)){

                $entity = $this->entityModel->getSingleEntity($id);
                $seasons = $this->entityModel->getSeasons($id);
                $season_videos = $this->entityModel->getSeasonVideos($id);
                $suggested_videos = $this->entityModel->getSuggestedVideos($id);
                
                $data = [
                    "entity" => $entity,
                    "seasons" => $seasons,
                    "season_videos" => $season_videos,
                    "suggested_videos" => $suggested_videos,
                ];
                
                $this->view("series/seasons", $data);
            } else {
                redirect("start");
            }
        }
    }