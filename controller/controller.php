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
        
        return  header('location: ../view/administracao.php');
    }
    #CASO O USUARIO NÂO EXISTA DEVOLVER A VIEW login.php
    return  header('location: ../view/loginAdmin.php');
}

if($req == "adicionarVideo"){
    #INCLUIR OBJETOS
    include "../model/anime.php";
    include "../model/videoAnime.php";

    #GET PARAMETRS FORM
    $nome = $_POST['inputNome'];
    $desc = $_POST['txtDesc'];
    $url = $_POST['inputURL'];

    #CRIAR O OBJETO ANIME E VIDEOANIME
    $anime = new Anime();
    #SET VALORES ANIME
    $anime->setNome($nome);
    $anime->setDescricao($desc);
    #INSERT VALUES DATABASE
    if($anime->inserirAnime($conn) >= 1){
        #PEGAR O RETURN DO SELECTID
        $id = $anime->selectId($conn);
        #SETA O RETORNO NO ID
        $anime->setId($id);
        #SELECT ID, PARA ENVIAR O VALOR DO OBEJTO COMPLETO A funcão EnviarVideo

        if($anime->getId() >= 0){
            #CREATE OBJECT VIDEOANIME
            $videoAnime = new videoAnime;
            #SET VALUES VIDEOANIMES
            $videoAnime->setURL($url);
            
           #SETAR URL
           try{
                $videoAnime->inserirURL($anime->getId(), $conn);
                return header("Location: ../view/index.php");
           }catch(Exception $e){
                echo $e->getMessage();
           }
        }
    }
    #ERRO NA HORA DE INSERIR É REDIRECIONADO
    return header("Location: ../view/administracao.php");
}




?>