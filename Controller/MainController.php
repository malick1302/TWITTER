<?php
require_once CONTROLLER . "/UserController.php";
require_once CONTROLLER . "/HomeController.php";

class MainController
{
    private $user;
    private $home;

    public function __construct()
    {
        $this->user = new UserController();
        $this->home = new HomeController();
    }
    public function homePage()
    {
        if (isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
            $actualUserData = $this->user->getInfos($_COOKIE["user_id"], 1);
            require_once VIEW . "/pages/homeView.php";
        } else
            header("Refresh:0; url=?page=");
    }
    public function searchPage()
    {
        if (isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
            $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));
            $hashtag = count($url) == 2 ? end($url) : null;
            if (isset($_POST['search']) && $_POST['search']) {
                $hashtag = $_POST['search'];
            }
            $tweets = $this->home->getAllTweets($hashtag);
            $existing_usernames = $this->home->getAllUsernames();
            require_once VIEW . "/pages/searchView.php";
        } else
            header("Refresh:0; url=?page=");
    }

    public function registerPage()
    {
        $register_check = $this->user->registerCheck();
        if ($register_check == true)
            header("location: ?page=login");
        else if (isset($_COOKIE['user_id']))
            header("location: ?page=home");
        else
            require_once VIEW . "/pages/registerView.php";
    }

    public function loginPage()
    {
        $logs_check = $this->user->checkLogs();
        if (isset($logs_check) && $logs_check['id'] > 0)
            header("location: ?page=home");
        else if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'])
            header("location: ?page=home");
        else
            require_once VIEW . "/pages/loginView.php";
    }

    public function profilePage()
    {
        $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));
        if (count($url) <= 2) {
            $username = end($url);
        }
        if ($_COOKIE['user_id'] && $username == "profile") {
            $user_infos = $this->user->getInfos($_COOKIE['user_id'], 1);
            $user_follows = $this->user->getUserFollowers($user_infos[0]["id"], 0);
            $user_followings = $this->user->getUserFollowers($user_infos[0]["id"], 1);
            require_once VIEW . "/pages/profileView.php";
        } else if ($username != "profile") {

            $user_infos = $this->user->getInfos($username, 0);
            $user_follows = $this->user->getUserFollowers($user_infos[0]["id"], 0);
            $user_followings = $this->user->getUserFollowers($user_infos[0]["id"], 1);
            if (count($user_infos) < 1) {
                header("Refresh:2; url=?page=login");
            } else {
                require_once VIEW . "/pages/profileView.php";
            }
        } else
            header("Refresh:0; url=?page=");
    }

    public function messagePage()
    {
        if (isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
            $data = $this->user->getUser();
            $user_infos = $this->user->getInfos($_COOKIE['user_id'], 1);
            $user_conversations = $this->user->getAllConv($user_infos[0]["id"]);
            $usernames = array_column($data, 'username');
            require_once VIEW . "/pages/messageView.php";
        } else
            header("Refresh:0; url=?page=");
    }

    public function page404()
    {
        require_once VIEW . "/pages/404View.php";
    }

    public function logout()
    {
        setcookie("user_id", "", time() - 3600);
        setcookie("username", "", time() - 3600);
        setcookie("display_name", "", time() - 3600);
        header("Refresh:0; url=?page=login");
    }

    public function updateProfile()
    {
        $user_infos = $this->user->getInfos($_COOKIE['user_id'], 1);
        $this->user->getUpdates($user_infos);
        header("Refresh:0; url=?page=profile");
    }

    public function post()
    {
        if (isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
            $this->home->sendPost();
            header("Refresh:0; url=?page=home");
        } else
            header("Refresh:0; url=?page=");
    }

    public function followPage()
    {
        if (isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
            $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));
            $type = count($url) == 3 ? end($url) : null;
            $username = $url[1];
            // echo "user -> " .$username;
            $user_infos = $this->user->getInfos($username, 0);
            $user_follows = $this->user->getUserFollowers($user_infos[0]["id"], 0);
            $user_followings = $this->user->getUserFollowers($user_infos[0]["id"], 1);
            // print_r($user_followings);
            $followings_list = $this->user->getFollowList($user_followings, 1);
            $followers_list = $this->user->getFollowList($user_follows, 0);
            // print_r($followings_list);
            require_once VIEW . "/pages/followView.php";
        } else
            header("Refresh:0; url=?page=");
    }
}
