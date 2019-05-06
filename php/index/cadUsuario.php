<?php
require "..\\..\\model/conexao.php";
require "..\\valida.php";

try {
    $nick = $_GET['nick'];
    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];
    $nivelAcesso = 0;

    $nick = test_input($nick);
    $usuario = test_input($usuario);
    $senha = test_input($senha);
    if(empty($nick) || empty($usuario) || empty($senha)){
        echo "Prencha todos os Campos!";
    }
    else{

        //$conn->beginTransaction();

        $stmt = $conn->prepare("INSERT INTO usuario(nick, login, senha, nivelAcesso) VALUES(?, ?, ?, ?)");
        $stmt->bindParam(1, $nick);
        $stmt->bindParam(2, $usuario);
        $stmt->bindParam(3, $senha);
        $stmt->bindParam(4, $nivelAcesso);

        $stmt->execute();
        echo "Cadastrado";
    }
    //$stmt->commit();

    //echo "Cadastrado Com sucesso";
} catch (PDOExeception $e) {
    //$conn->rollback();
    echo $e->getMessage();
}
