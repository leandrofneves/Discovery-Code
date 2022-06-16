$(function(){
	$("#pesquisa").keyup(function(){
		//Recuperar o valor do campo
		var pesquisa = $(this).val();
		//Verificar se há algo digitado
		if(pesquisa != ''){
			//se o input for diferente de vazio esconde a tabela de todos os usuários
			$("#tabela_todos").hide();
			//cria uma var onde 'palavra' vai receber o valor da var pesquisa  
			var dados = {
				palavra : pesquisa
			}
			//passando por post para o 'proc_pesq_user.php' a var dados  
			$.post('proc_pesq_user.php', dados, function(retorna){
				//Mostra dentro da table os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}else{
			//se for vazio zera os resultados e 
			$(".resultado").html("");
			//mostra a table novamente
			$("#tabela_todos").show();
		}
	});
});