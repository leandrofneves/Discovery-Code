<?php 
    include_once 'conexao.php';

    $id         = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $tipo       = filter_input(INPUT_POST, 'nomeMat', FILTER_SANITIZE_STRING);
    $stt        = 0;
    $valor      = filter_input(INPUT_POST, 'valorMat', FILTER_SANITIZE_STRING);
    $forma      = filter_input(INPUT_POST, 'forma', FILTER_SANITIZE_STRING);

    $query_usuario  = "INSERT INTO cursos (tipo, valor, IDusuario, statusPag) VALUES ('$tipo','$valor','$id','$stt')";
    mysqli_query($conexao, $query_usuario); 

    if(mysqli_insert_id($conexao)){
        echo true;
    }else{
        echo false;
    }

?>