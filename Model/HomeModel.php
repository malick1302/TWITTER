<?php
require_once CONFIG . "/connect.php";
require_once CONFIG . "/private.php";

class HomeModel extends Connect
{
    private $connect;

    public function fetchUserId()
    {
        $this->connect = parent::pdo_connect();
        $id = $_COOKIE['user_id'];
        $query = "SELECT id FROM user WHERE MD5(CONCAT(id, " . "'" . SALT_COOKIE . "'" . ")) = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$id"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
    public function fetchTweets($hashtag = null)
    {
        try {
            $this->connect = parent::pdo_connect();
            if ($hashtag == null) {
                $query = "SELECT u.display_name, t.creation_date, t.id, u.firstname, u.lastname, t.content, u.username, t.id_user, t.reply_to FROM tweet t JOIN user u ON u.id=t.id_user ORDER BY t.creation_date";
            } else {
                $query = "SELECT u.display_name, t.creation_date, t.id, u.firstname, u.lastname, t.content, u.username FROM tweet t JOIN user u ON u.id=t.id_user WHERE content LIKE '%#$hashtag%' OR content LIKE '%@$hashtag%' ORDER BY t.creation_date";
            }
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_reverse($data); //reverse to display the most recent tweet first
        } catch (Exception $e) {
            echo "Tweet error: " . $e->getMessage();
            return false;
        }
    }

    public function fetchHashtags()
    {
        try {
            $this->connect = parent::pdo_connect();
            $query = "SELECT name FROM hashtag";
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_column($data, 'name', 'hashtags');
        } catch (Exception $e) {
            echo "Hashtags: " . $e->getMessage();
            return false;
        }
    }

    public function fetchUsernames()
    {
        try {
            $this->connect = parent::pdo_connect();
            $query = "SELECT username, picture FROM user";
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $php_data = array_column($data, 'picture', 'username');
            $js_data = array_column($data, 'username');
            $new_data = array("0" => $php_data, "1" => $js_data);
            return $new_data;
        } catch (Exception $e) {
            echo "MODEL ERROR: " . $e->getMessage();
            return false;
        }
    }

    public function uploadPost($content, $medias, $reply_to = null)
    {
        try {
            // setcookie("debug", "entered uploadpost");
            $media1 = isset($medias[0]) ? $medias[0] : "NULL";
            $media2 = isset($medias[1]) ? $medias[1] : "NULL";
            $media3 = isset($medias[2]) ? $medias[2] : "NULL";
            $media4 = isset($medias[3]) ? $medias[3] : "NULL";
            $this->connect = parent::pdo_connect();
            $user_id = $this->fetchUserId();
            $hashtags = $this->extractHashtags($content);
            // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return array_column($data, 'username');
            foreach ($hashtags as $hashtag) {
                $query = "SELECT id FROM hashtag WHERE name = ?";
                $stmt = $this->connect->prepare($query);
                $stmt->execute([$hashtag]);
                $existingHashtag = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$existingHashtag) {
                    $query = "INSERT INTO hashtag (name) VALUES (?)";
                    $stmt = $this->connect->prepare($query);
                    $stmt->execute([$hashtag]);
                }
            }

            if ($reply_to == null) {
                $query = "INSERT INTO tweet (id_user, content, media1, media2, media3, media4) VALUE (?,?,?,?,?,?)";
                $stmt = $this->connect->prepare($query);
                $stmt->execute(["$user_id", "$content", "$media1", "$media2", "$media3", "$media4"]);
            } else {
                $query = "INSERT INTO tweet (id_user, reply_to, content, media1, media2, media3, media4) VALUE (?,?,?,?,?,?,?)";
                $stmt = $this->connect->prepare($query);
                $stmt->execute(["$user_id", "$reply_to", "$content", "$media1", "$media2", "$media3", "$media4"]);
            }
        } catch (Exception $e) {
            echo "MODEL ERROR (uploadPost): " . $e->getMessage();
            return false;
        }
    }


    function addLike($id_tweet)
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "INSERT INTO likes (id_user, id_tweet) VALUE (?,?)";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$user_id", "$id_tweet"]);
    }
    function removeLike($id_tweet)
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "DELETE FROM likes WHERE id_user=? AND id_tweet=?";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$user_id", "$id_tweet"]);
    }

    function addRetweet($id_tweet)
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "INSERT INTO retweet (id_user, id_tweet) VALUE (?,?)";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$user_id", "$id_tweet"]);
    }
    function removeRetweet($id_tweet)
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "DELETE FROM retweet WHERE id_user=? AND id_tweet=?";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$user_id", "$id_tweet"]);
    }

    function fetchTweetLikes($id_tweet)
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "SELECT COUNT(*) AS 'likes_number' FROM likes WHERE id_tweet=?";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$id_tweet"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function fetchTweetRetweets($id_tweet)
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "SELECT COUNT(*) AS 'retweet_number' FROM retweet WHERE id_tweet=?";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$id_tweet"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function fetchAllTweetsLikesInfo()
    {
        $this->connect = parent::pdo_connect();
        $query = "SELECT * FROM likes";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function fetchAllTweetsRetweetInfo()
    {
        $this->connect = parent::pdo_connect();
        $query = "SELECT * FROM retweet";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function fetchUserFollows()
    {
        $this->connect = parent::pdo_connect();
        $user_id = $this->fetchUserId();
        $query = "SELECT username, id FROM user u JOIN follow f ON u.id=id_user_followed WHERE id_user_follow=?";
        $stmt = $this->connect->prepare($query);
        $stmt->execute(["$user_id"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function extractHashtags($content)
    {
        preg_match_all('/#(\w+)/', $content, $matches);
        return $matches[1];
    }
}
