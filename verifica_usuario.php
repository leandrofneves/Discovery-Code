<?php
    include_once 'conexao.php';

    $email = filter_input(INPUT_POST, 'emailLog');
    $sql = "SELECT * FROM `usuario` WHERE `email` = '{$email}'";

    $query = $conexao->query( $sql );

    if( $query->num_rows > 0 ) {
        echo 'Já existe!';
    } else {
        echo 'Não existe ainda!';
    }
?>