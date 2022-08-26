<?php

namespace App\Models;

use App\Models\ModelClass as Model;
use App\Models\UserClass as User;

class UserManager extends Model{
    
    public function findUser($pseudo) {
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":pseudo" => $pseudo
        ]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($data) {
            
            return true;
        } else {
            return null;
        }
    }

    public function findMdp($mdp){
        $sql = "SELECT * FROM users WHERE mdp = :mdp";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":mdp" => $mdp
        ]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($data) {
            $mdp = new User($data->id,$data->pseudo,$data->mail,$data->mdp);
            return $mdp;
        } else {
            return null;
        }
    }

    public function findMail($mail) {
        $sql = "SELECT * FROM users WHERE mail = :mail";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":mail" => $mail
        ]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($data) {
            
            return true;
        } else {
            return null;
        }
    }

    public function insertMail($pseudo, $mail, $mdp) {
        $sql = "INSERT INTO users (pseudo, mail, mdp)VALUES (:pseudo, :mail, :mdp)";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo,
            ":mail"=>$mail,
            ":mdp"=>$mdp
        ]);
    }
    
    public function findUserByMail($mail) {
        $sql = "SELECT * FROM users WHERE mail = :mail";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":mail" => $mail
        ]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($data) {
            $user = new User($data->id,$data->pseudo,$data->mail,$data->mdp);
            return $user;
        } else {
            return null;
        }
    }
}