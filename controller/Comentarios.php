<?php
class Comentarios {
    public function enviar(){
        $conn = new Conexao();

        $video = $_SESSION['video'];

        $comment = $_GET['comment'];

        #CRIAR OBJETO DO MODEL COMENTÁRIO
        $comentario = new Comentario();
        $comentario->setIdAnime($video['idAnime']);
        $comentario->setIdUsuario($_SESSION['idUsuario']);
        $comentario->setComentario($comment);
        $comentario->setData(date('Y-m-d'));
        $retorno = $comentario->cadastrar($conn->conectar());
        if($retorno == 1){
            return 'Mensagem enviada';
        }
        return 'Mensagem não enviada';
    }

    public function get(){
        $conn = new Conexao();

        #PEGAR SESSÃO
        $video = $_SESSION['video'];

        #OBJETO DO BANCO
        $comement = new Comentario();
        #SETAR VALORES
        $comement->setIdAnime($video['idAnime']);
        $comement->setIdUsuario($_SESSION['idUsuario']);
        #REPOSTA DO MODEL DE COMENTARIOS/ COM OS COMENTARIOS
        $resp = $comement->buscar($conn->conectar());
        #INICAR SESSÃO
        if(count($resp) != 0){
            return $resp;
        }
        return false;
    }

}