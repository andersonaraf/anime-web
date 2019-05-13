<?php
Class Usuario{
    private $id;
    private $nick;
    private $login;
    private $senha;
    private $descricao;
    private $dataDeNascimento;
    private $nivelAcesso;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNick(){
        return $this->nick;
    }
    public function setNick($nick){
        $this->nick = $nick;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDataDeNascimento(){
        return $this->dataDeNascimento;
    }
    public function setDataDeNascimento($dataDeNascimento){
        $this->dataDeNascimento = $dataDeNascimento;
    }

    public function getNivelAcesso(){
        return $this->nivelAcesso;
    }
    public function setNivelAcesso($nivelAcesso){
        $this->nivelAcesso = $nivelAcesso;
    }

    public function logar($conn){
        #CONSULTA SQL
        $sql = "SELECT * FROM usuario WHERE login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->login);
        $stmt->execute();
        #TRANSFORMANDO EM ARRAY A CONSULTA
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        #VERIFICANDO SE O USUÁRIO É VALIDO
        if($this->senha == $row['senha'] && $row['nivelAcesso'] >= "1"){
            #pergunta pro marlon
            #INICIANDO A SESSÃO -> CASO O USUÁRIO SEJA VALIDO
            session_start();
            $_SESSION['id'] = "S";
            $_SESSION['row'] = $row;
            #RERTONO O ARRAY PARA O CONTROLLER
            return $row;
        }
        #RETURN 0 CASO O USUÁRIO SEJA INVALIDO
        return 0;
    }

    public function deslogar(){

    }

    public function cadastrarUsuario(){

    }

    public function alterarNivelAcesso(){

    }

}



?>