<?php
session_start();
    $valor = isset($_SESSION['id']) ? 'S' : 'N';
    if($valor == 'N'){
        header("Location: ../../index.html");
    }

?>