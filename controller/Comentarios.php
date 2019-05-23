<?php
class Comentarios {
    public function enviar(){
        $conn = new Conexao();
        $sess = new Session();
        $sess->inicia();

        $video = $_SESSION['video'];

        $comment = $_GET['comment'];

        #CRIAR OBJETO DO MODEL COMENTÁRIO
        $comentario = new Comentario();
        $comentario->setId($video['idAnime']);
        $comentario->setIdUsuario($_SESSION['idUsuario']);
        $comentario->setComentario($comment);
        $comentario->setData(date('Y-m-d'));
        $retorno = $comentario->cadastrar($conn->conectar());
        if($retorno != 0){
            return true;
        }
        return false;
    }

    public function get(){
        $conn = new Conexao();
        $sess = new Session();
        $comement = new Comentario();
        $resp = $comement->buscar();

        $sess->inicia();
        $_SESSION['rowComentario'] = $resp;
    }
}