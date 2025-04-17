<?php
require_once MODEL . "/UserModel.php";
require_once MODEL . "/UploadsModel.php";
require_once MODEL. "/HomeModel.php";

class UserController {

    private $user;
    private $upload;
    private $home;

    public function __construct()
    {
        $this->user = new User();
        $this->upload = new Uploads();
        $this->home = new HomeModel();
    }

    public function registerCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST))
        {
            $addUser = $this->user->addUser($_POST['firstname'], $_POST['lastname'], trim($_POST['email']), $_POST['birthdate'], hash_hmac('ripemd160', $_POST['password'], SALT), trim($_POST['username']));
            if ($addUser == 0)
                return true;
            else
                return $addUser;
        }
    }

    public function checkLogs()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST))
        {
            $data = $this->user->getLogs($_POST['email'], $_POST['password']);
            echo $data;
            if ($data != -1 && $data != -2)
            {
                setcookie("user_id", md5($data['id'].SALT_COOKIE), strtotime("+1 week"));
                setcookie("username", $data['username'], strtotime("+1 week"));
                setcookie("display_name", $data['display_name'], strtotime("+1 week"));
                setcookie("picture", $data['picture'], strtotime("+1 week"));
                return $data;
            }
            else
                return $data;
        }   
    }

    public function getUpdates($user_infos)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST))
        {
            foreach($user_infos[0] as $key => $val)
            {
                if (key_exists($key, $_POST['update']) && $_POST['update'][$key] == $user_infos[0][$key])
                    unset($_POST['update'][$key]);
            }
            $this->user->updateUser($_POST['update'], $user_infos[0]['username']);
            $this->upload->uploadUserPictures($user_infos[0]['username'], $_FILES);
        }
    }

    public function getInfos($user, $nb)
    {
        if ($nb == 1)
        {
            $data = $this->user->getUserInfos($user);
            return $data;
        }
        else if($nb == 0)
        {
            $data = $this->user->getUserInfos(null, $user);
            return $data;
        }
    }

    public function getUserFollowers($user_id, $nb)
    {
        if($nb == 1)
        {
            $data = $this->user->getFollowings($user_id);
            return $data;
        }
        if($nb == 0)
        {
            $data = $this->user->getFollowers($user_id);
            return $data;
        }
    }

    public function getFollowList($id_list, $nb)
    {
        if ($nb == 1)
        {
            $list = $this->user->getFollowInfos($id_list, null);
            return $list;
        }
        elseif ($nb == 0)
        {
            $list = $this->user->getFollowInfos(null, $id_list);
            return $list;
        }
    }

    public function getUser()
    {
        $data = $this->user->getAllUserData();
        return $data;
    }

    public function getAllConv($user_id)
    {
        $user_convs = $this->user->getUserConvs($user_id);
        return $user_convs;
    }
}

