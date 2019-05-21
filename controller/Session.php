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
}