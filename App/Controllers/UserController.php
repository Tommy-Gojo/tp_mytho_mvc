<?php


namespace App\Controllers;

use App\Models\UserClass;
use App\Models\UserManager;

class UserController {

    private $userManager;
    public function __construct()
    {
        $this->userManager = new UserManager();  
    }
    
    public function displayLogin() {
        require "../App/Views/connexionView.php";
    }

    public function login() {
        $user = $this->userManager->findUserByMail($_POST['mail']);
        
        if ($user) {
            var_dump($_POST['mdp']);
            var_dump($user->getMdp());
            var_dump(password_verify($_POST['mdp'],$user->getMdp()));
            if (password_verify($_POST['mdp'],$user->getMdp())) {
                echo "cb";
                $_SESSION['userConnected'] = $user->getPseudo();
                
                header("location:".URL."accueil");
            } else {
                echo "erreur mdp";
            }
        } else {
            echo 'user n\'existe pas';
        }
    }

    public function InscrUser() {
        unset($_SESSION['error']);
        $mail = $this->userManager->findMail($_POST['mail']);
        $pseudo = $this->userManager->findUser($_POST['pseudo']);
        
        if ($mail || $pseudo){
            $_SESSION['error'] = "mail ou pseudo existant";
            header("location:" .URL. "Inscription");
            
        } else {
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            var_dump($mdp);
            $this->userManager->insertMail($_POST['pseudo'],$_POST['mail'],$mdp  );
            header("location:" .URL. "Connexion");
        }
    }
}

