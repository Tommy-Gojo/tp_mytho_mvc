<?php
session_start();

require "vendor/autoload.php";

use App\Controllers\UserController;
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? " https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

$userController =  new UserController;
try {
    if (empty($_GET['page'])) {
        echo "error";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require_once "App/Views/accueilView.php";
                // var_dump($url[0]) ;
                break;
            case "Connexion":
                require_once "App/Views/connexionView.php";
                $userController->login();
                
                // var_dump($url[0]) ;
                break;
            case "deconnexion":
                // var_dump($url[0]) ;
                break;
            case "Inscription":
                require_once "App/Views/inscriptionView.php";
                break;
            case "ValiderInscription":
                $userController->InscrUser();
                
                break;
            case "Articles":
                require_once "App/Views/articleView.php";
                break;
            default:
                throw new Exception('Error 404, page not found'); 
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
}
