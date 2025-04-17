<?php
require_once CONFIG . "/connect.php";

class Uploads extends Connect
{

    private $connect;

    private function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }

    public function uploadUserPictures($username)
    {
        $this->connect = parent::pdo_connect();
        $target_dir = PIC . "/uploads/";

        foreach ($_FILES as $key => $val) {
            if ($key == "profile-picture") {
                $randUrl = $this->generateRandomString(6);
                $target_file = $target_dir . basename($_FILES["profile-picture"]["name"]);
                $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $target_file = $target_dir . $randUrl . ".$image_file_type";
                $final_path = "assets/uploads/" . $randUrl . ".$image_file_type";
                $upload = 1;
                if ($_FILES['profile-picture']['tmp_name']) {
                    $img_check = getimagesize($_FILES['profile-picture']['tmp_name']);
                    if ($img_check !== false && $_FILES['profile-picture']['size'] <= 500000) {
                        if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
                            $upload = 0;
                        } else
                            $upload = 1;
                    } else {
                        $upload = 0;
                    }
                    if ($upload == 1) {
                        if (move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $target_file)) {
                            $query = "UPDATE user SET picture = ? WHERE username = ?";
                            $stmt = $this->connect->prepare($query);
                            $stmt->execute(["$final_path", "$username"]);
                        }
                    }
                }
            }
            if ($key == "banner") {
                $randUrl = $this->generateRandomString(6);
                $target_file = $target_dir . basename($_FILES["banner"]["name"]);
                $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $target_file = $target_dir . $randUrl . ".$image_file_type";
                $final_path = "assets/uploads/" . $randUrl . ".$image_file_type";
                $upload = 1;
                if ($_FILES['banner']['tmp_name']) {
                    $img_check = getimagesize($_FILES['banner']['tmp_name']);
                    if (file_exists($target_file)) {
                        unlink($target_file);
                    }
                    if ($img_check !== false && $_FILES['banner']['size'] <= 500000) {
                        if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
                            $upload = 0;
                        } else
                            $upload = 1;
                    } else {
                        $upload = 0;
                    }
                    if ($upload == 1) {
                        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
                            $query = "UPDATE user SET header = ? WHERE username = ?";
                            $stmt = $this->connect->prepare($query);
                            $stmt->execute(["$final_path", "$username"]);
                        }
                    }
                }
            }
        }
    }

    public function uploadTweetPicture()
    {
        $this->connect = parent::pdo_connect();
        $target_dir = PIC . "/uploads/";
        $media_list = array();
        for ($i = 0; $i < count($_FILES); $i++) {
            $target_file = $target_dir . basename($_FILES[$i]["name"]);
            $final_path = "assets/uploads/" . basename($_FILES[$i]["name"]);
            $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $upload = 1;
            if ($_FILES[$i]['tmp_name']) {
                $img_check = getimagesize($_FILES[$i]['tmp_name']);
                if ($img_check[0] <= 200000 && $img_check[1] <= 200000) {
                    if (file_exists($target_file)) {
                        unlink($target_file);
                    }
                    if ($img_check !== false && $_FILES[$i]['size'] <= 500000000000) {
                        if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
                            $upload = 0;
                        } else
                            $upload = 1;
                    } else {
                        $upload = 0;
                    }
                    if ($upload == 1) {
                        if (move_uploaded_file($_FILES[$i]["tmp_name"], $target_file)) {
                            array_push($media_list, $final_path);
                        }
                    }
                }
            }
        }
        return $media_list;
    }
}