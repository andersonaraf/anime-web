<?php
class Anime{
    private $id;
    private $nome;
    private $descricao;
    
    public function getId(){
        return $this.id;
    }

    public function setId($id){
        $this.$id = $id;
    }

    public function getNome(){
        return $this.nome;
    }
    public function setNome($nome){
        $this.$nome = $nome;
    }

    public function getDescricao(){
        return $this.descricao;
    }
    public function setDescricao($descricao){
        $this.$descricao = $descricao;
    }

    public function adcionarAnime(){
        try {
            include "conexao.php";
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