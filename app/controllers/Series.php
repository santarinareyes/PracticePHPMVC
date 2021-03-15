<?php 
    class Series extends BaseController {
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
            $random_entity = $this->entityModel->getRandomSeries();
            $categories = $this->categoryModel->getSeriesCategories();
            $allEntities = $this->entityModel->getSeriesEntities();
            
            $data = [
                "user_id" => $_SESSION["user_id"],
                "random_entity" => $random_entity,
                "categories" => $categories,
                "all_entities" => $allEntities,
                "resume_entity" => "",
            ];

            $data["resume_entity"] = $this->entityModel->getUsersEntityInfo($data);
            
            $this->view("series/index", $data);
        }

        public function seasons($id = ""){
            if(!empty($id)){

                $entity = $this->entityModel->getSingleEntity($id);
                $seasons = $this->entityModel->getSeasons($id);
                $season_videos = $this->entityModel->getSeasonVideos($id);
                $suggested_videos = $this->entityModel->getSuggestedVideos($id);
                $userSeenOrNot = $this->videoModel->userSeenOrNot($id, $_SESSION["user_id"]);
                
                $data = [
                    "user_id" => $_SESSION["user_id"],
                    "current_entity" => $id,
                    "entity" => $entity,
                    "seasons" => $seasons,
                    "season_videos" => $season_videos,
                    "suggested_videos" => $suggested_videos,
                    "resume_entity" => "",
                    "userSeenOrNot" => $userSeenOrNot,
                ];

                if($this->entityModel->getUsersLastViewed($data)){
                    $data["resume_entity"] = $this->entityModel->getUsersLastViewed($data);
                } else {
                    redirect("pages");
                }

                $this->view("series/seasons", $data);
            } else {
                redirect("start");
            }
        }

        public function watch($id){
            if(!empty($id)){
                $updateViewCount = $this->videoModel->updateViewCount($id); 
                $video = $this->videoModel->getSingleVideo($id);
                
                $data = [
                    "video_id" => $id,
                    "video" => $video,
                    "next_episode" => "",
                ];

                if($this->videoModel->getNextEpisode($data)){
                    $data["next_episode"] = $this->videoModel->getNextEpisode($data);
                }
                
                $this->view("series/watch", $data);
            } else {
                redirect("start");
            }
        }
    }