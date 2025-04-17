<?php
require_once CONFIG ."/connect.php";

class User extends Connect{

    private $connect;

    public function getAllUserData()
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT * FROM user";
            $stmt =$this->connect->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $e){
            $message_arr = explode(" ", $e->getMessage());
            if (in_array("Duplicate", $message_arr) && in_array("'user.email'", $message_arr))
            {
                echo $e->getMessage();
                return 1;
            }
            if (in_array("Duplicate", $message_arr) && in_array("'user.username'", $message_arr))
            {
                return 2;
            }
        }
    }

    public function addUser($firstname, $lastname, $email, $birthdate, $password, $username){
        try{
            $this->connect = parent::pdo_connect();
            $default_profile_picture = ASSETS . "/100_180t180_2636709856_inconnujm_fxWdth.png";
            $default_banner_picture = ASSETS . "/default_banner_pic.png";
            $display_name = $firstname . " " . $lastname;
            $query = "INSERT INTO user (firstname, lastname, email, birthdate, password, username, display_name, picture, header) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt =$this->connect->prepare($query);
            $stmt->execute(["$firstname", "$lastname", "$email", "$birthdate", "$password", "$username", "$display_name", "$default_profile_picture", "$default_banner_picture"]);
            return -1;
        }catch(Exception $e){
            $message_arr = explode(" ", $e->getMessage());
            if (in_array("Duplicate", $message_arr) && in_array("'user.email'", $message_arr))
            {
                echo $e->getMessage();
                return 1;
            }
            if (in_array("Duplicate", $message_arr) && in_array("'user.username'", $message_arr))
            {
                return 2;
            }
        }
    }

    public function updateUser($arr, $username){
        $this->connect = parent::pdo_connect();
        foreach($arr as $key => $val)
        {
            $query = "UPDATE user SET $key = ? WHERE username = ?";
            $stmt =$this->connect->prepare($query);
            $stmt->execute(["$val", "$username"]);
        }
    }

    public function updatePictures($pic_arr)
    {
        foreach($pic_arr as $key => $val)
        {
            if ($key == "banner")
            {
                
            }
            else if ($key == "profile-picture")
            {
                
            }
        }
    }

    public function getLogs($email, $password)
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT id, email, username, display_name, password, picture FROM user WHERE email = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$email"]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (isset($data['email']))
            {
                if ($data['password'] && hash_equals(hash_hmac('ripemd160', $password, SALT),$data['password']))
                    return $data;
                else
                    return -2;
            }
            else
            {
                return -1;
            }
        }catch(Exception $e){
            echo "Getlogs error \n" . $e->getMessage() . "\n email: \"$email\" ----- password: \"$password\"";
            return false;
        }
    }

    public function getUserInfos($id = null , $username = null)
    {
        if($id)
        {
            try{
                $this->connect = parent::pdo_connect();
                $query = "SELECT * FROM user WHERE MD5(CONCAT(id, "."'".SALT_COOKIE."'".")) = ?";
                $stmt = $this->connect->prepare($query);
                $stmt->execute(["$id"]);
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(Exception $e){
                echo "GetUserInfos error \n" . $e->getMessage();
                return false;
            }
        }
        else if($username)
        {
            try{
                $this->connect = parent::pdo_connect();
                $query = "SELECT * FROM user WHERE username = ?";
                $stmt = $this->connect->prepare($query);
                $stmt->execute(["$username"]);
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(Exception $e){
                echo "GetUserInfos error \n" . $e->getMessage();
                return false;
            }
        }
    }

    public function addFollow($follow_id, $user_id)
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "INSERT INTO follow (id_user_follow, id_user_followed) VALUES (?,?)";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$user_id", "$follow_id"]);
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function removeFollow($follow_id, $user_id)
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "DELETE FROM follow WHERE id_user_follow = ? AND id_user_followed = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$user_id", "$follow_id"]);
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getFollowers($id)
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT id_user_follow FROM follow WHERE id_user_followed = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$id"]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_column($data, 'id_user_follow');
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function getFollowings($id)
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT id_user_followed FROM follow WHERE id_user_follow = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$id"]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_column($data, 'id_user_followed');
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getFollowInfos($followers_ids = null, $followings_ids = null)
    {
        $follows_arr = array();
        if ($followers_ids != null)
        {
            try{
                $this->connect = parent::pdo_connect();
                foreach($followers_ids as $id)
                {
                    $query = "SELECT username, display_name, picture, biography FROM user WHERE id = ?";
                    $stmt = $this->connect->prepare($query);
                    $stmt->execute(["$id"]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    array_push($follows_arr, $data);
                }
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }
        elseif ($followings_ids != null)
        {
            try{
                $this->connect = parent::pdo_connect();
                foreach($followings_ids as $id)
                {
                    $query = "SELECT username, display_name, picture, biography FROM user WHERE id = ?";
                    $stmt = $this->connect->prepare($query);
                    $stmt->execute(["$id"]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    array_push($follows_arr, $data);
                }
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }
        return $follows_arr;
    }

    public function sendMessage($receiver, $id_sender, $content, $media = "null")
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT id FROM user WHERE username = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$receiver"]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_receiver = $data["id"];
            $query = "INSERT INTO message (id_receiver, id_sender, content, media) VALUES (?,?,?,?)";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$id_receiver", "$id_sender", "$content", "$media"]);
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserMessage($receiver, $sender)
    {
        $tab = array();
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT id FROM user WHERE username = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$receiver"]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_receiver = $data["id"];
            array_push($tab, $id_receiver);
            $query = "SELECT * FROM message WHERE (id_sender = ? AND id_receiver = ?) OR (id_receiver = ? AND id_sender = ?) ORDER BY date;";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$sender","$id_receiver","$sender","$id_receiver"]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            array_push($tab, $data);
            return $tab;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserConvs($id_sender)
    {
        try{
            $this->connect = parent::pdo_connect();
            $query = "SELECT  username FROM message INNER JOIN user ON user.id = id_receiver AND id_sender = ? GROUP BY username";
            $stmt = $this->connect->prepare($query);
            $stmt->execute(["$id_sender"]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_column($data, "username");
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
}