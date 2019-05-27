<?php
class UsuarioAction {
    public function sair(){
        $sess = new Session();
        $sess->deletarAll();

    }
}