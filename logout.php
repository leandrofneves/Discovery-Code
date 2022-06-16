<?php
    include_once 'conexao.php';
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['logado']);
    session_destroy();
    mysqli_close($conexao);
    setcookie('idUs', null, -1, '/');
    echo "<script>alert('Logout efetuado com sucesso! Esperamos que você volte em breve.')</script>";
    echo "<script>window.location = 'index.php';</script>";
?>