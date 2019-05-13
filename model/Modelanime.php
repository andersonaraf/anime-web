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
    
    public function adcionarAnime($conn){
        try {
            $sql = "INSET INTO anime(nome, descricao) VALUES(?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, getNome());
            $stmt->bindParam(2, getDescricao());
            $stmt->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
        
    }
    
}
?>