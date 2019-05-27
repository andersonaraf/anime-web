<?php
class Comentario {
    private $id;
    private $idAnime;
    private $idUsuario;
    private $comentario;
    private $data;

    public function getId() {
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getIdAnime() {
        return $this->idAnime;
    }
    public function setIdAnime($idAnime): void {
        $this->idAnime = $idAnime;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getComentario() {
        return $this->comentario;
    }
    public function setComentario($comentario){
        $this->comentario = $comentario;
    }

    public function getData() {
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }

    public function cadastrar(PDO $conn){
        $sql = "INSERT INTO comentario(idAnime, idUsuario, comentario, data) VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->idAnime);
        $stmt->bindParam(2, $this->idUsuario);
        $stmt->bindParam(3, $this->comentario);
        $stmt->bindParam(4, $this->data);
        return $stmt->execute();
    }

    public function buscar(PDO $conn){
        $sql = "SELECT usuario.nick, comentario.comentario, comentario.data, comentario.id, comentario.idAnime, comentario.idUsuario FROM anime INNER JOIN comentario ON comentario.idAnime = anime.id INNER JOIN usuario ON usuario.id = comentario.idUsuario WHERE comentario.idAnime = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->idAnime);
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }
}