<?php
    session_start();
    include_once "conexao.php";

    $titulo          = filter_input(INPUT_POST, 'tituloperg', FILTER_SANITIZE_STRING);
    $pergunta        = filter_input(INPUT_POST, 'area1a', FILTER_SANITIZE_STRING);
    $codProgramacao  = filter_var($_POST['codProgramacao2'], FILTER_SANITIZE_MAGIC_QUOTES);
    $idp             = filter_input(INPUT_POST, 'idp', FILTER_SANITIZE_STRING);

    $result_perg     = "UPDATE pergunta SET titulo='$titulo', codProgramacao='$codProgramacao', pergunta='$pergunta', edit_perg=1, data_editperg=NOW() WHERE IDpergunta='$idp'";
    $resultado_perg  = mysqli_query($conexao, $result_perg);

    if(mysqli_affected_rows($resultado_perg)){
        $_SESSION['msg_editPerg'] = "<p style='color:green;' class='d-flex justify-content-center'>Pergunta editada com sucesso!</p>";
        echo "<script>window.location.href = 'detalhes.php?ID_pergunta=$idp';</script>";
    }else{
        $_SESSION['msg_editPerg'] = "<p style='color:red;' class='d-flex justify-content-center'>Algo deu errado! Por favor, tente novamente!</p>";
        echo "<script>window.location.href = 'detalhes.php?ID_pergunta=$idp';</script>";
    }
?>