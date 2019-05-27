<?php
class ListaAnime {
    public function carregarSession(){
        $conn = new Conexao();
        $anime = new Anime();

        #RETORNAR UM ARRAY COM AS URLS DOS ANIMES
        $rowAnimes = $anime->gerarLista($conn->conectar());
        $session = new Session();

        $session->anime($rowAnimes);
        return $rowAnimes;
    }

    public function carregamentoUnico(){
        $idVideo = $_GET['idVideo'];
        $conn = new Conexao();
        $anime = new Anime();

        $anime->setId($idVideo);
        $rowAnimeUnico = $anime->pegarVideo($conn->conectar());

        $sess = new Session();
        $sess->criar('video', $rowAnimeUnico);
    }
}