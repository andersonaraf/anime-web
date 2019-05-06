<?php
require "..\\..\\model/conexao.php";
require "..\\valida.php";
$buscaAnime = test_input($_GET['busca']);
$stmt = $conn->prepare("SELECT nome, descricao FROM anime WHERE nome LIKE ?");
$stmt->bindValue(1, '%' . $buscaAnime . '%');
$stmt->execute();

#VALIDA BUSCA
$countRow = $stmt->rowCount();
if ($countRow > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['nome'] . " - " . $row['descricao'];
} else {
    echo "Nada foi encontrado!";
}
