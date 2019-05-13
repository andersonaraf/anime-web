<?php
class Anime{
    private $id;
    private $nome;
    private $descricao;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;

        return $this;
    }

    public function inserirAnime(PDO $conn){
        $sql = "INSERT INTO anime(nome, descricao) VALUES(?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->descricao);
        return $stmt->execute();
    }


    public function selectId($conn){
        $sql = "SELECT id FROM anime WHERE nome = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->nome);
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['id'];
        }
        return "falso";
    }
}

?>