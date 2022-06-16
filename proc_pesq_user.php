<?php
	include_once 'conexao.php';

	$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
	$result_user = "SELECT * FROM usuario WHERE nome LIKE '%$usuarios%' OR IDusuario LIKE '%$usuarios%' OR email LIKE '%$usuarios%' OR telefone LIKE '%$usuarios%' OR cpf LIKE '%$usuarios%'";
	$resultado_user = mysqli_query($conexao, $result_user);

	if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
		echo "<thead>";
			echo "<th class='text-center'>ID</th>";
			echo "<th class='text-center'>Nome</th>";
			echo "<th class='text-center'>Email</th>";
			echo "<th class='text-center'>Telefone</th>";
			echo "<th class='text-center'>CPF</th>";
			echo "<th class='text-center'>Tipo de usuário</th>";
			echo "<th class='text-center'>Editar</th>";
			echo "<th class='text-center'>Apagar</th>";
		echo "</thead>";
		while($row_user = mysqli_fetch_assoc($resultado_user)){	
			echo "<tbody id='tabela_user'>";
				echo "<td class='text-center'>" . $row_user['IDusuario'] . "</td>";
				echo "<td class='text-center'>" . $row_user['nome'] . "</td>";
				echo "<td class='text-center'>" . $row_user['email'] . "</td>";
				echo "<td class='text-center'>" . $row_user['telefone'] . "</td>";
				echo "<td class='text-center'>" . $row_user['cpf'] . "</td>";
				$tipous = $row_user['tipo'];
				if ($tipous==0) {
					echo "<td class='text-center'>Comum</td>";
				}else {
					echo "<td class='text-center'>Administrador</td>";
				}
				echo "<td class='text-center'>";
					echo "<a href='#' data-toggle='modal' data-target='#modal_edita' data-id='".$row_user['IDusuario']."' data-nome='".$row_user['nome']."' data-email='".$row_user['email']."' data-cpf='".$row_user['cpf']."'  data-tel='".$row_user['telefone']."'  data-tipo='".$row_user['tipo']."'>";
						echo "<svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='black' class='bi bi-pencil-fill' viewBox='0 0 16 16'>";
							echo "<path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>";
						echo "</svg>";
					echo "</a>";
				echo "</td>";
				echo "<td class='text-center'>";
					echo "<a href='deleta_usuario.php?IDusuario=" . $row_user['IDusuario'] . "' data-confirm='Tem certeza de que deseja excluir?' data-oi='oi'>";
						echo "<svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='black' class='bi bi-trash-fill' viewBox='0 0 16 16'>";
							echo "<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>";
						echo "</svg>";
					echo "</a>";
				echo "</td>";
			echo "</tbody>";
		}
	}else{
		echo "Nenhum usuário encontrado ...";
	}
?>