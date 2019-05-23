<?php
class Comentario {
    private $id;
    private $idUsuario;
    private $comentario;
    private $data;

    public function getId() {
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
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
        $sql = "INSERT INTO comentario(id, idUsuario, comentario, data) VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->bindParam(2, $this->idUsuario);
        $stmt->bindParam(3, $this->comentario);
        $stmt->bindParam(4, $this->data);
        return  $stmt->execute();
    }

    public function buscar(PDO $conn){
        $sql = "SELECT comentario.comentario, comentario.data FROM anime INNER JOIN comentario ON anime.id = comentario.id INNER JOIN usuario ON usuario.id = comentario.idUsuario";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }
}