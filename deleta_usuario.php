<?php
    session_start();
    include_once "conexao.php";

    $id = filter_input(INPUT_GET, 'IDusuario', FILTER_SANITIZE_STRING);

    if(!empty($id)){
        $result_usuario = "DELETE FROM usuario WHERE IDusuario='$id'";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);
        if(mysqli_affected_rows($conexao)){
            $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
            header("Location: index.php");
        }
    }else{	
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
        header("Location: index.php");
    }
?>
