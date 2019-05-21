<?php
include "../model/usuario.php";
include "../derivados/conexao.php";


class RegistrarUsuario {
    public function registro(){
        $nick = $_POST['inputNick'];
        $login = $_POST['inputLogin'];
        $senha = $_POST['inputSenha'];

        $usuario = new Usuario();
        $usuario->setNick($nick);
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        $usuario->setNivelAcesso(0);

        #CRIAR OBEJTO CONEXAO
        $conn = new Conexao();
        if( $usuario->cadastrar($conn->conectar()) != 0){
            #VER O QUE FAZER
        }

    }

}