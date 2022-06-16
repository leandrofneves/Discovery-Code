<?php
	require('fpdf/fpdf.php');
	$teste = $_POST["test"];
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	if ($teste=="HTML") {
		$pdf->SetTitle('Material de apoio HTML');
		$pdf->SetFont('Arial','',18);
		$pdf->Write(10,"Material de apoio HTML\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"A criação de qualquer página de internet depende do HTML. Existem muitas outras possibilidades, até mais avançadas, porém dificilmente você verá algum site que não utilize esta linguagem. De tão básica, para criar um documento em HTML não é necessário nenhum programa de edição específico. Dá até pra usar o Bloco de Notas do Windows. \nHTML (de HyperText Markup Language) é uma linguagem de marcação de texto através das TAGs, que permite apresentar informações na internet; como links, imagens e o próprio texto. Todas as páginas que você abre são a leitura e a interpretação de um arquivo que contém esse código HTML.\nCriada por Tim-Berners Lee, a linguagem básica para a criação de documentos hipertexto para a Web nasceu entre o final da década de 80 e início da década de 90, e teve a sua primeira versão lançada oficialmente em 1993.","");
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nComo trabalhar com HTML?\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"Para trabalhar com essas tags (de marcadores, em inglês) não é preciso saber de cabeça todas as disponíveis, mas ter uma noção das principais já facilita bastante o trabalho na hora de criar uma página ou inserir um código dentro de uma página já feita.\nDe qualquer forma, existem dois tipos de editores de HTML no mercado: os que permitem escrever os códigos inserindo automaticamente as tags, e os que oferecem um ambiente visual, que enquanto você desenvolve, vai mostrando em paralelo o resultado das suas ações; como o Adobe Dreamweaver e o Microsoft FrontPage.","");
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nTags\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"Tags são marcações usadas para comunicar ao browser como deve ler aquele arquivo para mostrar a página conforme você projetou. Todas as tags possuem o mesmo formato: abrem com um sinal de menor “<” e fecham com um de maior “>”. Ex.: <b>.\n","");
		$pdf->Write(10,"Quando se trabalha em HTML, é preciso ter noção de que tudo o que se abre, precisa ser fechado. Ou seja: se você iniciar uma tag, será necessário fechá-la. Caso contrário, haverá algum erro na visualização do navegador.\nO fechamento dessa etiqueta terá que necessariamente incluir uma barra ”/”. Ex.:\n<b>Essa tag, deixará este texto em negrito</b>\nHá uma exceção para algumas tags, que possuem comandos que não precisam de um conteúdo para existirem. Estas são chamadas tags de comandos isolados. Por exemplo: para pular a linha, basta acrescentar a tag <br />.","");
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nMarcação\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"As marcações delimitam a função de cada texto: cabeçalho, rodapé e corpo. Ela passa ao navegador informações de como esse texto deve ser exibido para o leitor.\nA evolução das normas da W3C (grupo de empresas que tem por objetivo manter e melhorar os padrões ligados a tecnologias para a internet) levou muitos a usarem a linguagem de folhas de estilo, também chamadas de CSS, substituindo, em alguns casos, marcações e atributos em HTML.","");
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nAtributo\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"Algumas tags permitem que você acrescente informações adicionais de comando, e isso é feito através de atributos escritos dentro das tags, acompanhados por um sinal de igual (=). Entre aspas, são inseridas as informações desse atributo, e quando houver mais de uma informação, tudo deve ser separado por ponto e vírgula. ex.:\n<h2 style='background-color:#ff0000;'>Esse texto vai ficar colorido</h2>","");
		$pdf->Write(10,"Pelos atributos você consegue fazer alterações no estilo do layout da página, como a mudança de uma cor, fonte e tamanho do texto. Eles serão inseridos com frequência na tag <body>.\nA linguagem HTML está em constante evolução, e atualmente na versão 5 ela é até mesmo capaz de rodar vídeos e músicas (sim, é o fim do plugin do Flash).","");
	}else if ($teste=="CSS") {
		$pdf->SetTitle('Material de apoio CSS');
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nO que é CSS?\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"CSS ou CSS3 não é uma linguagem de programação, e sim uma linguagem de estilos, estilização\nApesar de ter alguns recursos que são presentes em linguagens de programação, e estar bem mais perto de ser do que o HTML\nAinda faltam elementos fundamentais para ser considerada uma, é bom lembrar que a cada dia são adicionados mais recursos, quem sabe futuramente não seja possível programar com CSS? \nCSS é um acrônimo de Cascading Style Sheets, ou seja, folhas de estilo em cascata\nPor causa da possibilidade de adicionar novas folhas de estilos que vão sobrepondo os estilos da antiga, formando um efeito cascata\nFrequentemente utilizada em projetos web, faz parte da tríade fundamental: HTML, CSS e JavaScript\nQualquer site web leva HTML para transmitir dados e informações, e consequentemente precisa de estilos para ficar bonito, se não todos os sites seriam iguais\n","");
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"A sintaxe do CSS\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"O CSS para ser aplicado a algum elemento do HTML precisa seguir algumas regras\nPrimeiramente precisamos escolher um elemento do HTML, exemplo:\ndiv\nAgora estaremos aplicando CSS a uma div do nosso site\nPara delimitar as regras, onde terminam e começam, precisamos adicionar uma abertura e fechamento de chaves { }, veja:\ndiv {\n}\nAgora dentro destas chaves colocamos o código CSS, que segue sempre um mesmo padrão\nNome da regra, separação entre valor e nome por dois pontos, valor e finaliza a sentença com ponto e vírgula\nEntão para aplicar um estilo de cor de fundo teremos:\ndiv {\nbackground-color: red;\n}\nAgora a div está com cor de fundo vermelha!","");
	}else if ($teste=="JQUERY") {
		$pdf->SetTitle('Material de apoio JQuery');
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nO que é jQuery?\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"jQuery é uma biblioteca popular do JavaScript. Ela foi criado por John Resig em 2006 com o propósito de facilitar a vida dos desenvolvedores que usam JavaScript nos seus sites. Não é uma linguagem de programação separada, funciona em conjunto com o JavaScript. Com jQuery, você vai conseguir fazer muito mais com menos – eu vou explicar logo mais.\nCriar códigos pode ser um pouco cansativo, especialmente quando isso envolve muitas strings. A jQuery compacta várias linhas de código em uma única função. Assim, você não precisa reescrever todos os blocos repetidamente para concluir sua tarefa.","");
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nExemplos de jQuery\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"Você pode criar efeitos de slide com apenas algumas linha de código.\nVocê pode usar os comandos SlideDown(), SlideUp() e SlideToogle().\n$('#flip').click(function(){\n$('#panel').slideDown();\n});\nCom jQuery, você também pode esconder os elementos em HTML com os comandos Hide() e Show(). Veja:\n$('#hide').click(function(){\n$('p').hide();\n});\n$('#show').click(function(){\n$('p').show();\n});\n","");	
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"Recursos Importantes do jQuery\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"Uma característica do motivo pelo qual o jQuery se tornou tão famoso e popular é, provavelmente, os recursos de plataforma cruzada. Os erros são corrigidos automaticamente e a execução acontece da mesma maneira nos navegadores mais usados, como Chrome, Firefox, Safari, MS Edge, IE, Android e iOS.\njQuery também torna o Ajax muito mais simples. Ajax funciona de forma assíncrona com o código, que significa que o código escrito com o Ajax pode se comunicar com o servidor e atualizar seu conteúdo sem precisar recarregar a página.\nMas isso vem com alguns problemas. Diferentes navegadores executam a API do Ajax de maneira diferente. Assim, o código deve aderir a todos os navegadores. Se for feito manualmente, esse é um trabalho difícil e demorado. Felizmente, o jQuery faz todo o trabalho manual e adapta o código a todos os navegadores da web.\nDepois, há a manipulação do DOM (Document Object Model) com vários meios sobre como fazer isso. Mas, para simplificar, ele permite que você insira e/ou remova elementos DOM em uma página HTML, bem como linhas mais simples.\nCriar animações também é simples com o jQuery. Como no exemplo de código acima, você consegue executar tudo com algumas linhas de código, tudo o que você precisa é inserir as variáveis.\nA transferência de documentos HTML, bem como a manipulação de efeitos e eventos, também são melhores com o jQuery.","");
	}else if ($teste=="JAVASCRIPT") {
		$pdf->SetTitle('Material de apoio Javascript');
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nO que é JavaScript?\n");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"Sejam bem-vindos ao curso de JavaScript para iniciantes! Vamos fazer uma análise profunda da linguagem, respondendo questões como 'O que é JavaScript?', e 'O que ele faz?', para você se sentir confortável com a proposta da linguagem.","");
		$pdf->Write(10,"\nPré requisitos:	Interação básica com o computador, entendimento básico de HTML e CSS.","");
		$pdf->Write(10,"\nObjetivo:	Se familiarizar com a linguagem, com o que ela pode fazer, e como tudo isso pode ser utilizado em um website.","");
		$pdf->Write(10,"\nDefinição de alto nível","");
		$pdf->Write(10,"\nJavaScript é uma linguagem de programação que permite a você implementar itens complexos em páginas web — toda vez que uma página da web faz mais do que simplesmente mostrar a você informação estática — mostrando conteúdo que se atualiza em um intervalo de tempo, mapas interativos ou gráficos 2D/3D animados, etc. — você pode apostar que o JavaScript provavelmente está envolvido. É a terceira camada do bolo das tecnologias padrões da web, duas das quais (HTML e CSS) nós falamos com muito mais detalhes em outras partes da Área de Aprendizado.","");	
		$pdf->SetFont('Arial','',15);
		$pdf->Write(10,"\nOrdem de execução do JavaScript");
		$pdf->SetFont('Arial','',12);
		$pdf->Write(10,"\nQuando o navegador encontra um bloco de código JavaScript, ele geralmente executa na ordem, de cima para baixo. Isso significa que você precisa ter cuidado com a ordem na qual você coloca as coisas. Por exemplo, vamos voltar ao bloco JavaScript que nós vimos no primeiro exemplo:\nconst para = document.querySelector('p');\npara.addEventListener('click', atualizarNome);\nfunction atualizarNome() {\n;et nome = prompt('Informe um novo nome:');\npara.textContent = 'Jogador 1: ' + nome;\n}\nAqui nós estamos selecionando um parágrafo (linha 1) e anexando a ele um event listener (linha 3). Então, quando o parágrafo recebe um clique, o bloco de código atualizarNome() (linhas 5 a 8) é executado. O bloco de código atualizarNome()(esses tipos de bloco de código reutilizáveis são chamados 'funções') pede ao usuário que informe um novo nome, e então insere esse nome no parágrafo, atualizando-o.\nSe você inverte a ordem das duas primeiras linhas de código, ele não fucionaria — em vez disso, você receberia um erro no console do navegador — TypeError: para is undefined. Isso significa que o objeto para não existe ainda, então nós não podemos adicionar um event listener a ele.","");
	}
	$pdf->Output();
?>