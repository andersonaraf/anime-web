<?php
class Session {
    public function inicia(){
        session_start();
    }

    public function validar($nome, $direcionamento){
        if(!empty($_SESSION[$nome])){
            header("Location: ../view/" .$direcionamento);
        }
    }

    public function nivelAcessoAdmin($nome, $direcionamento){
        if($_SESSION[$nome] == 1){
            return header("Location: ../view/" .$direcionamento);
        }
    }
    
    public function criar($nome, $valor){
        $_SESSION[$nome] = $valor;
    }

    public function esvaziar($nome){
        unset($_SESSION[$nome]);
    }

    public function deletarAll(){
        session_destroy();
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