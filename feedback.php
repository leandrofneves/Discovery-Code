<?php
    include_once 'conexao.php';

	$nome    	= filter_input(INPUT_POST, 'nome-feed', FILTER_SANITIZE_STRING);
	$email   	= filter_input(INPUT_POST, 'email-feed', FILTER_SANITIZE_STRING);
	$msg     	= filter_input(INPUT_POST, 'mensagem-feed', FILTER_SANITIZE_STRING);

	$query_usuario = "INSERT INTO feedback (nome_usuario, email_usuario, mensagem) VALUES ('$nome', '$email','$msg')";
	mysqli_query($conexao, $query_usuario);

	if(mysqli_insert_id($conexao)){
		echo true;
	}else{
		echo false;
	}
?>