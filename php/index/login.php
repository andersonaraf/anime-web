<?php
require '../../model/conexao.php';
require '../valida.php';

$login = $_POST['inputLogin'];
$senha = $_POST['inputPass'];

$stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ?");
$stmt->bindParam(1, $login);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($senha == $row['senha']){
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['nick'] = $row['nick'];
}

?>