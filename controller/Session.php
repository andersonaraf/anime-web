<?php
class Session {
    public function inicia(){
        session_start();
    }

    public function validar(){

    }
    public function anime($rowAnime){
        $_SESSION['rowAnime'] = $rowAnime;
    }

    public function usuario(Usuario $user){
        $_SESSION['idUsuario'] = $user->getId();
        $_SESSION['nick'] = $user->getNick();
        $_SESSION['login'] = $user->getLogin();
        $_SESSION['nivelAcesso'] = $user->getNivelAcesso();
    }
}