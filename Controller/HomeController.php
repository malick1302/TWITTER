<?php
require_once __DIR__."/../config/config.php"; //require config here beacause ajax is calling this file without index.php (where config is included)
require_once MODEL."/HomeModel.php";
require_once MODEL."/UploadsModel.php";
class HomeController
{
    private $homeModel;
    private $uploadModel;
    public static $timeline;
    public $new_timeline;

    public function __construct(){
        $this->homeModel = new HomeModel;
        $this->uploadModel = new Uploads;
    }
    public function getAllTweets($hashtag = null){
        $allTweets = $this->homeModel->fetchTweets($hashtag);
        return $allTweets;
    }
    public function getAllUsernames(){
        $allUsernames = $this->homeModel->fetchUsernames();
        return $allUsernames;
    }
    public function getAllHashtags(){
        $allHashtags = $this->homeModel->fetchHashtags();
        return $allHashtags;
    }
    public function sendPost($reply_to = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            // setcookie("debut", "insendpost");
            if (!empty($_POST) && !empty(trim($_POST["post-content"]))) {
                $media_list = $this->uploadModel->uploadTweetPicture();
                $this->homeModel->uploadPost($_POST["post-content"], $media_list, $reply_to);
            }
            if (!empty($_POST) && !empty(trim($_POST["post-comment"]))) {
                $media_list = $this->uploadModel->uploadTweetPicture();
                $this->homeModel->uploadPost($_POST["post-comment"], $media_list, $reply_to);
            }
        }
    }
    public function updateLike($action, $tweet_id){
        if ($action == "like") {
            $this->homeModel->addLike($tweet_id);
        } else if ($action == "undo-like"){
            $this->homeModel->removeLike($tweet_id);
        }
    }
    public function updateRetweet($action, $tweet_id){
        if ($action == "retweet") {
            $this->homeModel->addRetweet($tweet_id);
        } else if ($action == "undo-retweet"){
            $this->homeModel->removeRetweet($tweet_id);
        }
    }
    public function getTweetLikes($tweet_id){
        return $this->homeModel->fetchTweetLikes($tweet_id);
    }
    public function getTweetRetweets($tweet_id){
        return $this->homeModel->fetchTweetRetweets($tweet_id);
    }
    public function getAllTweetsLikesInfo(){
        return $this->homeModel->fetchAllTweetsLikesInfo();
    }
    public function getAllTweetsRetweetInfo(){
        return $this->homeModel->fetchAllTweetsRetweetInfo();
    }
    public function getUserId(){
        return $this->homeModel->fetchUserId();
    }
    public function getUserFollows(){
        return $this->homeModel->fetchUserFollows();
    }
}
