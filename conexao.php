<?php
    $servidor = 'localhost';
    $usuario  = 'root';
    $password = ''; 
    $banco    = 'projeto';
    $conexao  = mysqli_connect($servidor,$usuario,$password,$banco)
                or die('Não foi possivel conectar');
    mysqli_set_charset($conexao, 'utf8');
?>