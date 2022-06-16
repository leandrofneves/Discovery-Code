<?php
    session_start();
    include_once "conexao.php";

    $id            = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $nome          = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email         = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $tel           = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $cpf           = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $tipo_usuario  = $_POST['gridRadios'];

    $result_usuario     = "UPDATE usuario SET nome='$nome', email='$email', cpf='$cpf', telefone='$tel', tipo='$tipo_usuario' WHERE IDusuario='$id'";
    $resultado_usuario  = mysqli_query($conexao, $result_usuario);

    if(mysqli_affected_rows($conexao)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
        echo "<script>window.location = 'index.php';</script>";
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
        echo "<script>window.location = 'index.php';</script>";
    }
?>