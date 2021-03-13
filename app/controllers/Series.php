<?php 
    class Series extends BaseController {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            }

            $this->entityModel = $this->model("Entity");
        }

        public function index(){
            redirect("pages");
        }

        public function seasons($id = ""){
            if(!empty($id)){

                $entity = $this->entityModel->getSingleEntity($id);
                $seasons = $this->entityModel->getSeasons($id);
                $season_videos = $this->entityModel->getSeasonVideos($id);
                
                $data = [
                    "entity" => $entity,
                    "seasons" => $seasons,
                    "season_videos" => $season_videos,
                ];
                
                $this->view("series/seasons", $data);
            } else {
                redirect("start");
            }
        }
    }