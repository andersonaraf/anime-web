<?php
#REQ DECIDE QUAL AÇÃO SERA TOMADA PELO CONTROLLER;
$req = $_GET['req'];

#INCLUIR A CLASSE USUÁRIO
include "../model/usuario.php";

#INCLUIR A CONEXÃO
require "../derivados/conexao.php";


if( $req == "loginAdmin" ){
    $login = $_POST['inputLogin'];
    $senha = $_POST['inputSenha'];
    #FAZER TRATAMENTO É da um return

    #CRIAR OBJETO DO TIPO USUARIO
    $usuario = new Usuario();
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $resp = $usuario->logar($conn); 
    #CASO O USUÁRIO EXISTA DEVOLVER A VIEW administracao.php
    if($resp != 0){
        
        return  header('location: ../view/adiminitracao.php');
    }
    #CASO O USUARIO NÂO EXISTA DEVOLVER A VIEW login.php
    return  header('location: ../view/loginAdmin.php');
}

if($req == ){

}




?>