<?php

namespace App\Models;

class UserClass {

    private $id;
    private $pseudo;
    private $mail;
    private $mdp;
   

    public function __construct($id, $pseudo, $mail, $mdp){
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->mdp = $mdp;
        
    }

    public function getId(){
        return htmlspecialchars($this->id);
    }
    public function getPseudo(){
        return htmlspecialchars($this->pseudo);
    }
    public function getMail(){
        return htmlspecialchars($this->mail);
    }
    public function getMdp(){
        return htmlspecialchars($this->mdp);
    }
   

    public function setId($id){
        $this->id = $id;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setPassword($mdp){
        $this->mdp = $mdp;
    }
    
}