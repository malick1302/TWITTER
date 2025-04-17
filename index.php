<?php
require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/config/private.php";
require_once CONTROLLER . "/MainController.php";
$mainController = new MainController();
if (empty($_GET["page"])) {
    $url[0] = 'register';
} else {
    $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));
}

switch ($url[0]) {
    case "register":
        $mainController->registerPage();
        break;
    case "home":
        $mainController->homePage();
        break;
    case "login":
        $mainController->loginPage();
        break;
    case "logout":
        $mainController->logout();
        break;
    case "search":
        $mainController->searchPage();
        break;
    case "profile":
        $mainController->profilePage();
        break;
    case "message":
        $mainController->messagePage();
        break;
    case "post":
        $mainController->post();
        break;
    case "follow":
        $mainController->followPage();
        break;
    case "update":
        $mainController->updateProfile();
        break;
    default:
        $mainController->page404();
        break;
}
