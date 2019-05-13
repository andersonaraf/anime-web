<?php
Class Video{
    public function pedirVideo(){
        include "../derivados/conexao.php";
        $sql = "SELECT videoAnime.url, videoAnime.id idVideo, anime.id idAnime, anime.nome, anime.descricao FROM anime INNER JOIN videoAnime ON videoAnime.id = anime.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}

?>