<?php
    include_once 'conexao.php';

    $titulo          = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $linguagem       = filter_input(INPUT_POST, 'linguagem', FILTER_SANITIZE_STRING);
    $pergunta        = filter_input(INPUT_POST, 'area1', FILTER_SANITIZE_STRING);
    // filter_var e FILTER_SANITIZE_MAGIC_QUOTES faz com que aceite aspas simples e duplas no banco de dados
    $codProgramacao  = filter_var($_POST['codProgramacao'], FILTER_SANITIZE_MAGIC_QUOTES);
    $IDusuario       = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $query = "INSERT INTO pergunta (IDusuario,linguagem,titulo,dataPerg,codProgramacao,pergunta) VALUES ('$IDusuario','$linguagem','$titulo', NOW() ,'$codProgramacao','$pergunta')";
    $insert = mysqli_query($conexao, $query);

    if($insert){
        echo true;
        echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Sua pergunta foi cadastrada com sucesso! Aguarde para ser respondido(a).');";
            echo "window.location.href='listagem.php'";
        echo "</script>";
    }else{
        echo false;
        echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Algo deu errado');";
            echo "window.location.href='index.php'";
        echo "</script>";
    }

?>
