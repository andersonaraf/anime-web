<?php
#REQ DECIDE QUAL AÇÃO SERA TOMADA PELO CONTROLLER;
$req = $_GET['req'];

#INCLUIR A CONEXÃO
require "../derivados/conexao.php";
require "Session.php";

#INCLUDE OBRIGATORIOS
include "ListaAnime.php";
include "../model/anime.php";
include "../model/videoAnime.php";
include "../model/Comentario.php";
include "../model/usuario.php";

#INCLUDE DE CONTROLLER;
include "Comentarios.php";
include "UsuarioAction.php";
include "RegistrarUsuario.php";

#CARREGADA EM QUALQUER SITE
listaAnimes();

#CRIAR OBJETO CONEXAO
$conn = new Conexao();
$sess = new Session();
$sess->inicia();

if( $req == "login" ){
    $login = $_POST['inputLogin'];
    $senha = $_POST['inputSenha'];


    #CRIAR OBJETO DO TIPO USUARIO
    $usuario = new Usuario();
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $resp = $usuario->logar($conn->conectar());
    $usuario->setId($resp['id']);
    $usuario->setLogin($resp['login']);
    $usuario->setNick($resp['nick']);
    $usuario->setNivelAcesso($resp['nivelAcesso']);
    #CASO O USUÁRIO EXISTA DEVOLVER A VIEW animeBlakc.php
    if($resp != 0){
        listaAnimes();
        $sess->usuario($usuario);
        if($usuario->getNivelAcesso() != 1){

            return header('location: ../view/animeBlack.php');
        }
        #USUÁRIO ADMIN
        return  header('location: ../view/administracao.php');
    }
    #CASO O USUARIO NÂO EXISTA DEVOLVER A VIEW login.php
    return  header('location: ../view/login.php');
}

if($req == "adicionarVideo"){
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
if($req == "registrar"){
    $registrarUsuario = new RegistrarUsuario();
    $registrarUsuario->registro();
}

#ESCOLHER VIDEO ÚNICO PARA CARREGAR NA SESSÃO E DEVOLVER A PAGINA ANIMEBLACKVIDEO.PHP
if($req == "escolherVideo"){
    #APAGAR VALORES NA SESSÃO DE COMENTARIOS = rowComentario;
    $sess->esvaziar('rowComentario');
    #APAGAR VALROES NA SESSÃO VIDEO PARA EVITAR CONFLITOS
    $sess->esvaziar('video');


    #CARREGAR O VIDEO NA SESSÃO
    $listaAnime = new ListaAnime();
    $listaAnime->carregamentoUnico();

    #CARREGAR OS COMENTÁRIOS NA SESSÃO
    $comment = new Comentarios();
    $rowComentario = $comment->get();
    #DAR VALORES A SESSÃO E RETORNA A PAGINA:
    if($rowComentario != false){
        $sess->criar('rowComentario', $rowComentario);
        return header('location: ../view/animeBlackVideo.php');
    }
    $sess->criar('rowComentario', 'Não tem comentários para esse anime');
    return header('location: ../view/animeBlackVideo.php');

}

#USADA PAGAR COMENTARIO VIA AJAX
if($req == "comentar"){
    #APAGAR VALORES NA SESSÃO DE COMENTARIOS = rowComentario;
    $sess->esvaziar('$rowComentario');

    #CRIAR OBJETO
    $comentario = new Comentarios();
    $retorno = $comentario->enviar();

    $rowComentario = $comentario->get();
    $sess->criar('rowComentario', $rowComentario);
    echo $retorno;
}

#DEVOLVER A PÁGINA INICIAL
if($req == "animeBlack.php"){
    listaAnimes();
    return header('Location: ../view/animeBlack.php');
}

#REPOSTA DOS REFRESH PARA O AJAX
if($req == 'refreshComent'){
    #APAGAR VALORES NA SESSÃO DE COMENTARIOS = rowComentario;
    $sess->esvaziar('rowComentario');

    #CARREGAR OS COMENTÁRIOS NA SESSÃO
    $comment = new Comentarios();

    $rowComentario = $comment->get();
    #DAR VALORES A SESSÃO E RETORNA A PAGINA:
    if($rowComentario != false){
        $sess->criar('rowComentario', $rowComentario);
    }else{
        $sess->criar('rowComentario', 'Não tem comentários para esse anime');
    }
    /*echo "<pre>";
        print_r($_SESSION['rowComentario']);
    echo "<pre>";*/
}


#CARREGAR PAGINA DE COMENTARIOS COMPLETO
if($req == 'comentarioCom'){
    //APAGAR VALORES NA SESSÃO TODA VEZ QUE FOR REQUISITADO
    $sess->esvaziar('rowComentCompleto');


    #CRIAR OBJETO
    $comment = new Comentarios();
    $rowComentComple = $comment->getCompleto();

    #VALIDAR RESPOSTA
    if($rowComentComple != false){
        $sess->criar('rowComentCompleto', $rowComentComple);
        return header("Location: ../view/comentarios.php");
    }else{
        $sess->criar('rowComentCompleto', 'Não tem comentários para esse anime');
        return header("Location: ../view/comentarios.php");
    }
}

if($req == 'sair'){
    $action = new UsuarioAction();
    $action->sair();
    $sess->validar('idUsuario', 'login.php');
}

function listaAnimes(){
    #INCLUDE CONTROLLER
    $session = new Session();
    $animeLista = new ListaAnime();
    $session->anime($animeLista->carregarSession());
}

?>