<?php
#REQ DECIDE QUAL AÇÃO SERA TOMADA PELO CONTROLLER;
$req = $_GET['req'];

#INCLUIR A CONEXÃO
require "../derivados/conexao.php";
#CRIAR OBJETO CONEXAO
$conn = new Conexao();

if( $req == "login" ){
    $login = $_POST['inputLogin'];
    $senha = $_POST['inputSenha'];
    #FAZER TRATAMENTO É da um return

    #INCLUIR MODELS
    include "../model/usuario.php";

    #CRIAR OBJETO DO TIPO USUARIO
    $usuario = new Usuario();
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $resp = $usuario->logar($conn->conectar());
    #CASO O USUÁRIO EXISTA DEVOLVER A VIEW administracao.php
    if($resp != 0){
        if(row['nivelAcesso'] != 1){
            return header('location: ../view/animeBlack.php');
        }
        return  header('location: ../view/administracao.php');
    }
    #CASO O USUARIO NÂO EXISTA DEVOLVER A VIEW login.php
    return  header('location: ../view/login.php');
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
    $idAnime = $anime->inserirAnime($conn->conectar());
    echo $idAnime;
    if($idAnime != 0){
        $videoAnime = new VideoAnime();
        $videoAnime->setId($idAnime);
        $videoAnime->setURL($url);
        if($videoAnime->inserirURL($conn->conectar()) != 0){
            return header('location: ../view/animeBlack.php');
        }
    }
    #ERRO NA HORA DE INSERIR É REDIRECIONADO
    return header("Location: ../view/administracao.php");
}

#REGISTRO
if($req = "registrar"){
    #INCLUIR CONTROLLERS
    include "../controller/RegistrarUsuario.php";

    $registrarUsuario = new RegistrarUsuario();
    $registrarUsuario->registro();
}


?>