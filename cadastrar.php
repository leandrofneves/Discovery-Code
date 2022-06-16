<?php 
	include_once 'conexao.php';

	$nome    	= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email   	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha   	= md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
	$telefone   = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$cpf        = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$tipo    	= 0;

	$select_email   = "SELECT email FROM usuario WHERE email='$email'";
    $result_email   = mysqli_query($conexao, $select_email);

	if (mysqli_num_rows($result_email)==0) {
		$query_usuario = "INSERT INTO usuario (nome, email, senha, telefone, cpf, tipo) VALUES ('$nome', '$email','$senha','$telefone','$cpf','$tipo')";
		mysqli_query($conexao, $query_usuario);
		echo "0";
	}else{
		echo "1";
	}
?>