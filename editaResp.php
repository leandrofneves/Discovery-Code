<?php
    session_start();
    include_once "conexao.php";

    $resp            = $_POST['area1ar'];
    $codProgramacao  = filter_var($_POST['codPro2'], FILTER_SANITIZE_MAGIC_QUOTES);
    $idr             = filter_input(INPUT_POST, 'idr', FILTER_SANITIZE_STRING);
    $idp             = filter_input(INPUT_POST, 'idp', FILTER_SANITIZE_STRING);

    $result_perg     = "UPDATE resposta SET resposta='$resp', codProgramacao='$codProgramacao', edit_resp=1, data_editresp=NOW() WHERE IDresposta='$idr'";
    $resultado_perg  = mysqli_query($conexao, $result_perg);

    if(mysqli_affected_rows($conexao)){
        $_SESSION['msg_editPerg'] = "<p style='color:green;' class='d-flex justify-content-center'>Resposta editada com sucesso!</p>";
        echo "<script>window.location.href = 'detalhes.php?ID_pergunta=$idp';</script>";
    }else{
        $_SESSION['msg_editPerg'] = "<p style='color:red;' class='d-flex justify-content-center'>Algo deu errado! Por favor, tente novamente!</p>";
        echo "<script>window.location.href = 'detalhes.php?ID_pergunta=$idp';</script>";
    }
?>