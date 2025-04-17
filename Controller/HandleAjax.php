<?php
require_once "./HomeController.php";
require_once MODEL . "/UserModel.php";
require_once MODEL . "/HomeModel.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $homeController = new HomeController;
    $homeModel = new HomeModel();
    $userModel = new User();

    $allTweetsLikesInfo = $homeController->getAllTweetsLikesInfo();
    $allTweetsRetweetInfo = $homeController->getAllTweetsRetweetInfo();
    $userFollows = $homeController->getUserFollows();
    $actual_user_id = $homeController->getUserId();

    if (isset($_POST["action"]) && isset($_POST["tweet_id"])) {
        if ($_POST["action"] == "undo-like" || $_POST["action"] == "like") {
            $homeController->updateLike($_POST["action"], $_POST["tweet_id"]);
            $likes = $homeController->getTweetLikes($_POST["tweet_id"]);
            $response = $likes;
        } elseif ($_POST["action"] == "undo-retweet" || $_POST["action"] == "retweet") {
            $homeController->updateRetweet($_POST["action"], $_POST["tweet_id"]);
            $shares = $homeController->getTweetRetweets($_POST["tweet_id"]);
            $response = $shares;
        }
    } elseif (isset($_POST["follow_id"]) && isset($_POST["user_id"]) && isset($_POST["state"])) {
        if ($_POST["state"] == "F")
            $userModel->addFollow($_POST["follow_id"], $homeModel->fetchUserId());
        if ($_POST["state"] == "U")
            $userModel->removeFollow($_POST["follow_id"], $homeModel->fetchUserId());
    } elseif (isset($_POST["post-content"])) {
        $homeController->sendPost();
        $response = "tweet posted";
	  } elseif (isset($_POST["receiver-username"]) && isset($_POST["message-sended"])) {
        if ($_POST["message-sended"] != "null")
        {
            $userModel->sendMessage($_POST["receiver-username"], $homeModel->fetchUserId(), $_POST["message-sended"]);
            $message = $userModel->getUserMessage($_POST["receiver-username"], $homeModel->fetchUserId());
            $response = $message;
        }
        else
        {
            $message = $userModel->getUserMessage($_POST["receiver-username"], $homeModel->fetchUserId());
            $response = $message;
        }
    }  elseif (isset($_POST["post-comment"])) {
        $homeController->sendPost($_POST["tweet_id_replyed_to"]);
        $response = "comment posted";
	  } elseif (isset($_POST["post-content"]) && $_POST["post-content"] == "@") {
        $user_data = $userModel->getAllUserData();
        $response = array_column($user_data, 'username');
    } else {
        $tweets = $homeController->getAllTweets();
        $hashtags = $homeController->getAllHashtags();
        $usernames = $homeController->getAllUsernames();
        $response = array(
            'tweets' => $tweets,
            'hashtags' => $hashtags,
            'usernames'  => $usernames[1],
            'pictures' => $usernames[0],
            'allTweetsLikesInfo' => $allTweetsLikesInfo,
            'allTweetsRetweetInfo' => $allTweetsRetweetInfo,
            'user_follows' => $userFollows,
            'actual_user_id' => $actual_user_id
        );
    }
    if ($response == "") {
        $response = "No data to return";
    }
    echo json_encode($response);
}
