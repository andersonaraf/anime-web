<?php

Class VideoAnime{
    private $id;
    private $URL;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }


    public function getURL(){
        return $this->URL;
    }
    public function setURL($URL){
        $this->URL = $URL;

        return $this;
    }

    public function inserirURL($idAnime ,PDO $conn){
        $sql = "INSERT INTO videoAnime(id, URL) VALUES(?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idAnime);
        $stmt->bindParam(2, $this->URL);
        if($stmt->execute() > 0){
            return 1;
        }
        return 0;
    }
}
?>