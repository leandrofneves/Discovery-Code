<?php
    session_start();
    include_once 'conexao.php';
    if(isset($_SESSION['normal'])){
?>
		<!DOCTYPE HTML>
		<html lang="pt-br">  
			<head>  
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>Discovery Code</title>
				<link rel="shortcut icon" type="imagex/png" href="img/logo_endereco.ico">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
				<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<!--TEXTAREA CODIGO-->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.9/ace.js"></script>
				<!--TEXTAREA PERGUNTA -->
				<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
				<script language="javascript">
					//Imprime todo conteudo para possibilitar a impressão
					function printPartOfPage(elementId){
						var printContent = document.getElementById(elementId);
						var windowUrl = 'about:blank';
						var windowName = 'Print' + new Date().getTime();
						var printWindow = window.open(windowUrl, windowName, ' , ,width=798,height=400');
						printWindow.document.write(printContent.innerHTML);
						printWindow.document.close();
						printWindow.focus();
						printWindow.print();
						printWindow.close();
					}
				</script>
			</head>
			<style>
				/* CSS da pergunta */
				.my-xml-editor{
					height: 250px;
				} 
				#titulop, #ling{
					height: 50px;
				}
				#titulop{
					width: 557px;
				}
				/* #area1{
					height: 200px;
					width: 800%;
				} */
				@media (max-width: 991px){
					#titulop{
						width: 464px;
					}
					/* #area1{
						height: 200px;
						width: 200px;
					} */
				}
				@media (max-width: 576px){
					#titulop{
						width: 418px;
					}
				}
				@media print {
					.noprint {
						display:none;
					}
				}
				body{
					background-color: #ffffff;
					margin-right: 0;
				}
				/* Estrutura do boleto */
				.table-boleto {
					font: 9px Arial;
					width: 666px;
				}
				.table-boleto td {
					border-left: 1px solid #000;
					border-top: 1px solid #000;
				}
				.table-boleto td:last-child {
					border-right: 1px solid #000;
				}
				.table-boleto .titulo {
					color: #000033;
				}
				.linha-pontilhada {
					color: #000033;
					font: 9px Arial;
					width: 100%;
					border-bottom: 1px dashed #000;
					text-align: right;
					margin-bottom: 10px;
				}
				.table-boleto .conteudo {
					font: bold 10px Arial;
					height: 11.5px;
				}
				.table-boleto .sacador {
					display: inline;
					margin-left: 5px;
				}
				.table-boleto td {
					padding: 1px 4px;
				}
				.table-boleto .noleftborder {
					border-left: none !important;
				}
				.table-boleto .notopborder {
					border-top: none !important;
				}
				.table-boleto .norightborder {
					border-right: none !important;
				}
				.table-boleto .noborder {
					border: none !important;
				}
				.table-boleto .bottomborder {
					border-bottom: 1px solid #000 !important;
				}
				.table-boleto .rtl {
					text-align: right;
				}
				.table-boleto .logobanco {
					display: inline-block;
					max-width: 150px;
				}
				.table-boleto .logocontainer {
					width: 257px;
					display: inline-block;
				}
				.table-boleto .logobanco img {
					margin-bottom: -5px;
					height: 27px;
				}
				.table-boleto .codbanco {
					font: bold 20px Arial;
					padding: 1px 5px;
					display: inline;
					border-left: 2px solid #000;
					border-right: 2px solid #000;
					width: 51px;
					margin-left: 25px;
				}
				.table-boleto .linha-digitavel {
					font: bold 14px Arial;
					display: inline-block;
					width: 406px;
					text-align: right;
				}
				.table-boleto .nopadding {
					padding: 0px !important;
				}
				.table-boleto .caixa-gray-bg {
					font-weight: bold;
					background: #ccc;
				}
				.info {
					font: 11px Arial;
				}
				.info-empresa {
					font: 11px Arial;
				}
				.header {
					font: bold 13px Arial;
					display: block;
					margin: 4px;
				}
				.barcode {
					height: 50px;
				}
				.barcode div {
					display: inline-block;
					height: 100%;
				}
				.barcode .black {
					border-color: #000;
					border-left-style: solid;
					width: 0px;
				}
				.barcode .white {
					background: #fff;
				}
				.barcode .thin.black {
					border-left-width: 1px;
				}
				.barcode .large.black {
					border-left-width: 3px;
				}
				.barcode .thin.white {
					width: 1px;
				}
				.barcode .large.white {
					width: 3px;
				}
				.float_left{
					float:left;
				}
				.center {
					text-align: center;
				}
				.conteudo.cpf_cnpj{
					float:right;
					width:24%;
				}    
			</style>
			<body>
				<div id="container">
					<!-- NAVBAR -->	
					<nav class="navbar fixed-top navbar-expand-lg" id="nav">
						<div class="container-fluid">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="myFunction();">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
								<img src="img/logo.png" class="img-fluid" alt="Logo Discovery Code" width="75" height="69">
								<a class="navbar-brand" href="index.php" id="DC">Discovery Code</a>
								<div class="mx-auto order-0">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="#sbnos">
												<span class="itensNav" id="a">Sobre nós</span>
											</a>
										</li>
										<li class="nav-item" id="local">
											<a class="nav-link active" href="#localizacao">
												<span class="itensNav" id="a2">Localização</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" href="#ctt" tabindex="-1" aria-disabled="true">
												<span class="itensNav" id="a3">Contato</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" href="listagem.php" tabindex="-1" aria-disabled="true">
												<span class="itensNav" id="a4">Perguntas cadastradas</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" href="meusMateriais.php" tabindex="-1" aria-disabled="true">
												<span class="itensNav" id="a5">Meus materiais</span>
											</a>
										</li>
									</ul>
								</div>
								<form class="d-flex" method="POST" action="listagem.php">
									<input class="form-control me-2" name="pesquisar" type="search" placeholder="Procurar..." aria-label="Search" id="inputSearch">
									<button type="submit" class="btn btn-outline-secondary" id="procura">Procurar</button>
								</form>               
								<button type="button" class="btn btn-outline-secondary" id="sair"  data-toggle="modal" data-target="#logaUsuarioModal" onclick="location.href='logout.php';">Sair</button>
							</div>
						</div>
					</nav>
					<!--------------------------------------------------------------------------------------->
					<!-- CAROUSEL/SLIDES -->
					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
						<div class="carousel-inner">
							<div id="fixa">
								<p class="h1" id="titulo">Possui uma pergunta?</p>
								<p id="legenda"><button type="button" class="btn btn-outline-light" style="width:120px;height:50px" data-toggle="modal" data-target="#modal-pergunta">Clique aqui</button></p>
							</div>
							<div class="carousel-item active">
								<img src="img/imgCarousel1.jpg" class="d-block w-100" alt="Imagem carousel">
							</div>
							<div class="carousel-item">
								<img src="img/imgCarousel2.jpg" class="d-block w-100" alt="Imagem carousel 2">
							</div>
							<div class="carousel-item">
								<img src="img/imgCarousel3.jpg" class="d-block w-100" alt="Imagem carousel 3">
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->
					<!-- MODAL QUE GERA O QRCODE -->
					<div id="modalQRcode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h5 class="modal-title">Pagamento por QR Code</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reload();">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Para realizar o pagamento você deve apontar sua câmera para o QR Code abaixo. <br><br>
								
									<img id="imageQRCode" style="display: block; margin-left: auto; margin-right: auto; heigth: 150px; width: 150px;">
				
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal" onclick="reload();">Fechar</button>
								</div>
							</div>
						</div>
					</div>		
					<!--------------------------------------------------------------------------------------->
					<!-- SOBRE NÓS -->
					<h3 id="sbnos">Sobre nós e nosso propósito</h3>
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td style="text-align: center;">
									<img src="img/gifSobreNos.gif" id="imgSobreNos">
								</td>
							</tr>
							<tr>
								<td id="txtQmsomos">
									Nós da Grid System criamos o site "Discovery Code" para facilitar a vida de programadores, com o nosso site buscamos 
									esclarecer qualquer dúvida a respeito de JavaScript, CSS, Jquery, entre outras linguagens. Para fazer a sua pergunta é bem simples, basta fazer um cadastro
									e abrir a pagina de perguntas e respostas e pronto! Lembrando que com o cadastro você pode responder qualquer outra pergunta, então sempre que souber a
									resposta para a dúvida de um colega não esqueça de responder!! E o mais importante, não tenha vergonha de fazer perguntas, pois outras pessoas possam estar com 
									a mesma dúvida. 
								</td>
							</tr>
						</tbody>
					</table>
					<!--------------------------------------------------------------------------------------->
					<!-- MODAL MATERIAL DE APOIO -->
					<div id="modalmaterialapoio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="h5">Material de apoio HTML </h5>
									<h5 class="alert alert-info" id="valorh5" style="margin-left: 80px;">R$ 45,50</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="post" id="formMat" class="form-signin">
										<?php
											$result     = "SELECT * FROM usuario WHERE IDusuario=".$_COOKIE['idUs'];
											$resultado  = mysqli_query($conexao, $result);
											$row        = mysqli_fetch_assoc($resultado); 
										?>
										<h6 id="lblCompra">Para realizar a compra do material é necessário escolher a forma de pagamento e confirmar sua senha.</h6>
										<h6>Forma de pagamento</h6>
										<div id="radios">							
											<input type="radio" id="forma1" name="forma" value="Boleto">
											<label for="forma1">Boleto</label>
											&nbsp;&nbsp;
											<input type="radio" id="forma2" name="forma" value="QR Code">
											<label for="forma2">QR Code</label>
											<div class="form-label-group">
												<span id="msg-errormat" style="color: #e32636;"></span>
											</div>
										</div>
										<div class="form-label-group">							
											<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value=<?php echo $row['nome'];?> readonly>
											<label for="nome">Seu nome</label>
										</div>
										<div class="form-label-group">
											<input type="email" id="email" name="email" class="form-control" placeholder="Email" value=<?php echo $row['email'];?> readonly>
											<label for="email">Seu email</label>
										</div>
										<div class="form-label-group">
											<input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" onkeypress='return somenteNumeros();' value=<?php echo $row['cpf'];?> readonly>
											<label for="cpf">CPF</label>
										</div>
										<div class="input-group">
											<div class="form-label-group">
												<input type="password" id="confirmaSenhabd" name="confirmaSenhabd" class="form-control" placeholder="Senha">
												<label for="confirmaSenhabd">Senha</label>
											</div>  
											<div class="input-group-append">
												<span class="input-group-text" id="basic-addon2">
													<img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho4" class="olho4">
												</span>
											</div>
											<span id="msg-errorsenha" style="color: #e32636;"></span>
										</div>
										<!-- *senha criptografada* -->
										<input type="hidden" id="senhac" value=<?php echo $row['senha']; ?>>

										<!-- *id do Usuario* -->
										<input type="hidden" id="id" name="id" value=<?php echo $row['IDusuario']; ?>>

										<!-- *nome do material* -->
										<input type="hidden" id="nomeMat" name="nomeMat" value="HTML">

										<!-- *valor do material* -->
										<input type="hidden" id="valorMat" name="valorMat" value="45.50">
									</div>
									<div class="modal-footer">
										<input type="submit" value="Realizar compra" id="realizaCompra" name="gerarBoleto" class="btn btn-info"> 
										<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
					<!-- SECTIONS DOS MATERIAS DE APOIO -->
					<h2 id="MaterialApoio">Adquira já nossos materias de apoio</h2>
					<section class="anime" id="matApoio">
						<div class="grid-text">
							<h2>HTML</h2>
							<p>No material de apoio sobre HTML você irá aprender códigos para estruturar uma página web e seu conteúdo. Por exemplo, conteúdos em parágrafos, em uma lista com marcadores ou usando imagens e tabelas.</p>
							<?php
								$result_crs     = "SELECT * FROM cursos WHERE IDusuario=".$_COOKIE['idUs']." AND tipo='HTML'";
								$resultado_crs  = mysqli_query($conexao, $result_crs);
								$row_crs        = mysqli_fetch_array($resultado_crs);
								if ($row_crs["tipo"] == "HTML") {
									echo "<button type='button' class='btn btn-primary' id='btnHtml' data-toggle='modal' data-target='#modalmaterialapoio' disabled>Já adquirido</button>";
								}else{
							?>
									<button type="button" class="btn btn-primary" id="btnHtml" data-toggle="modal" data-target="#modalmaterialapoio">Adquirir</button>
							<?php
								}
							
							?>
						</div>
						<div class="grid-img img-left">
							<img src="img/html.png" class="img-fluid" width="135px" alt="Imagem HTML">
						</div>
					</section>
					<section class="anime2" id="matApoio">
						<div class="grid-img img-right">
							<img src="img/css.png" class="img-fluid" width="132px" alt="Imagem CSS">
						</div>
						<div class="grid-text">
							<h2>CSS</h2>
							<p>Nesse material você irá aprender a estilizar as páginas desenvolvidas com HTML. Definindo a aparência de cada página, alterando seu layout, o posicionamento dos elementos, fontes, cores e outras opções visuais. </p>
							<?php 
								$result_crs2     = "SELECT * FROM cursos WHERE IDusuario=".$_COOKIE['idUs']." AND tipo='CSS'";
								$resultado_crs2  = mysqli_query($conexao, $result_crs2);
								$row_crs2        = mysqli_fetch_array($resultado_crs2);
								if ($row_crs2["tipo"] == "CSS") {
									echo "<button type='button' class='btn btn-primary' id='btnHtml' data-toggle='modal' data-target='#modalmaterialapoio' disabled>Já adquirido</button>";
								}else{
							?>
									<button type="button" class="btn btn-primary" id="btnCss" data-toggle="modal" data-target="#modalmaterialapoio">Adquirir</button>
							<?php
								}
							?>
						</div>
					</section>
					<section class="anime" id="matApoio">
						<div class="grid-text">
							<h2>jQuery</h2>
							<p>Com o material de apoio sobre jQuery você irá aprender como manipular os elementos a partir de interações do usuário. Reforçando os fundamentos do JS, a sintaxe, variáveis, funções, objetos e outros elementos básicos.</p>
							<?php 
								$result_crs3     = "SELECT * FROM cursos WHERE IDusuario=".$_COOKIE['idUs']." AND tipo='jQuery'";
								$resultado_crs3  = mysqli_query($conexao, $result_crs3);
								$row_crs3        = mysqli_fetch_array($resultado_crs3);
								if ($row_crs3["tipo"] == "jQuery") {
									echo "<button type='button' class='btn btn-primary' id='btnHtml' data-toggle='modal' data-target='#modalmaterialapoio' disabled>Já adquirido</button>";
								}else{
							?>
									<button type="button" class="btn btn-primary" id="btnJq" data-toggle="modal" data-target="#modalmaterialapoio">Adquirir</button>
							<?php
								}
							?>
						</div>
						<div class="grid-img img-left">
							<img src="img/jquery_logo.png" class="img-fluid" width="180px" alt="Imagem Jquery">
						</div>
					</section>
					<section class="anime2" id="matApoio">
						<div class="grid-img img-right">
							<img src="img/js.png" class="img-fluid" width="135px" alt="Imagem JavaScript">
						</div>
						<div class="grid-text">
							<h2>JavaScript</h2>
							<p>No material de apoio sobre JavaScript você irá aprender como incluir, em uma página estática, elementos dinâmicos como mapas, formulários, operações numéricas, animações, infográficos interativos e muito mais. </p>
							<?php 
								$result_crs4     = "SELECT * FROM cursos WHERE IDusuario=".$_COOKIE['idUs']." AND tipo='JavaScript'";
								$resultado_crs4  = mysqli_query($conexao, $result_crs4);
								$row_crs4        = mysqli_fetch_array($resultado_crs4);
								if ($row_crs4["tipo"] == "JavaScript") {
									echo "<button type='button' class='btn btn-primary' id='btnHtml' data-toggle='modal' data-target='#modalmaterialapoio' disabled>Já adquirido</button>";
								}else{
							?>
									<button type="button" class="btn btn-primary" id="btnJs" data-toggle="modal" data-target="#modalmaterialapoio">Adquirir</button>
							<?php
								}
							?>
						</div>
					</section>
					<!--------------------------------------------------------------------------------------->
					<!-- LOCALIZAÇÃO -->
					<h2 id="localizacao">Localização</h2>
					<div id="googleMaps">
						<div class="map-responsive">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.7653989187606!2d-47.1146574850341!3d-22.91691718500672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c871fe37db6b%3A0x8affcb8e31e64b0f!2sAv.%20Ibirapuera%20-%20Campinas%2C%20SP%2C%2013060-240!5e1!3m2!1spt-BR!2sbr!4v1630547039319!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
					<p id="endereco">Av. Ibirapuera - Jardim Ipaussurama <br> Campinas - SP <br> 13060-240</p>
					<!--------------------------------------------------------------------------------------->			
				</div>
				<br><br><br>
				<!-- MODAL QUE GERA O BOLETO -->
				<div id="modalBoleto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header text-center">
								<h5 class="modal-title">Pagamento por Boleto</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reload();">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="printDiv">
								<div style="width: 666px">
									<div class="noprint info">
										<span class="header">Linha Digitável: 001 9 337370000000100 05009 401448 16060680935031</span>
										<span class="header" id="valorDoc2"> </span>
										<br>
										<div class="linha-pontilhada" style="margin-bottom: 20px;"></div>
									</div>
									<table class="table-boleto" cellpadding="0" cellspacing="0" border="0">
										<tbody>
										<tr>
											<td valign="bottom" colspan="8" class="noborder nopadding">
												<div class="linha-digitavel">      </div>
											</td>
										</tr>
										<tr>
											<td colspan="3" width="250" rowspan="2" valign="top">
												<div class="titulo">Beneficiário</div>
												<div class="conteudo">Grid System</div>
											</td>
											<td colspan="2">
												<div class="titulo">CPF/CNPJ do Beneficiário</div>
												<div class="conteudo">321.465.878-46</div>
											</td>
										</tr><tr>
											<td width="120">
												<div class="titulo">Agência/Código do Beneficiário</div>
												<div class="conteudo rtl">92424982</div>
											</td>
											<td width="110">
												<div class="titulo">Vencimento</div>
												<div class="conteudo rtl"> <?php $today = date('d/m/y', strtotime('+3 days')); echo $today;?> </div>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<div class="titulo">Pagador</div>
												<div class="conteudo float_left"><?php echo $row['nome'];?></div>
												<div class="conteudo cpf_cnpj"><?php echo $row['cpf'];?></div>
											</td>
											<td>
												<div class="titulo">Nº documento</div>
												<div class="conteudo rtl">46846868</div>
											</td>
											<td>
												<div class="titulo">Nosso número</div>
												<div class="conteudo rtl">16548652</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="titulo">Espécie</div>
												<div class="conteudo">R$</div>
											</td>
											<td>
												<div class="titulo">Quantidade</div>
												<div class="conteudo rtl">1</div>
											</td>
											<td>
												<div class="titulo">Valor</div>
												<div class="conteudo rtl">
													
												</div>
											</td>
											<td>
												<div class="titulo">(-) Descontos / Abatimentos</div>
												<div class="conteudo rtl">      </div>
											</td>
											<td>
												<div class="titulo">(=) Valor Documento</div>
												<div class="conteudo rtl" id="valorDoc">
													R$ 
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<div class="conteudo"></div>
												<div class="titulo">Demonstrativo</div>
											</td>
											<td>
												<div class="titulo">(-) Outras deduções</div>
												<div class="conteudo">      </div>
											</td>
											<td>
												<div class="titulo">(+) Outros acréscimos</div>
												<div class="conteudo rtl">      </div>
											</td>
											<td>
												<div class="titulo">(=) Valor cobrado</div>
												<div class="conteudo rtl">      </div>
											</td>
										</tr>
										<tr>
											<td colspan="4"><div style="margin-top: 10px" class="conteudo">      </div></td>
											<td class="noleftborder"><div class="titulo">Autenticação mecânica</div></td>
										</tr>
										<tr>
											<td colspan="5" class="notopborder"><div class="conteudo">      </div></td>
										</tr>
										<tr>
											<td colspan="5" class="notopborder"><div class="conteudo">      </div></td>
										</tr>
										<tr>
											<td colspan="5" class="notopborder"><div class="conteudo">      </div></td>
										</tr>
										<tr>
											<td colspan="5" class="notopborder nobottomborder"><div style="margin-bottom: 10px;" class="conteudo">      </div></td>
										</tr>
										<tr>
											<td colspan="5" class="notopborder bottomborder" style="padding: 0px 20px 10px 0px; text-align: right"><div class="titulo">Recibo do pagador</div></td>
										</tr>
										</tbody>
									</table>
									<br>
									<div class="linha-pontilhada"></div>
									<img src="data:image/png;base64,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" alt="">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" onclick="JavaScript:printPartOfPage('printDiv');">Imprimir</button>
								<button type="button" class="btn btn-light" data-dismiss="modal" onclick="reload();">Fechar</button>
							</div>
						</div>
					</div>
				</div>		
				<!--------------------------------------------------------------------------------------->
				<!-- MENSAGEM DE SUCESSO DO LOGIN -->
				<div id="msgCadSucesso2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-success text-center">
								<h5 class="modal-title" id="usuarioModal">Bem-vindo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Logado com sucesso!
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
				<!--------------------------------------------------------------------------------------->
				<!-- MENSAGEM DE SUCESSO DO FEEDBACK -->
				<div id="msgSucessFeedback" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-success text-center">
								<h5 class="modal-title" id="usuarioModal">Enviado com sucesso!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Nós agradecemos o seu feedback! Até a próxima.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
				<!--------------------------------------------------------------------------------------->
				<!-- MODAL FEEDBACK -->
				<div id="modal-feedback" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="col text-center">
									<h5 class="modal-title" id="titulo-modal">Contato</h5>
								</div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<span id="msg-error3"></span>
								<form method="post" id="modalfeedback" class="form-signin">
									<div class="form-group">
										<div class="input-group mb-2">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-user text-info">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#17a2b8" class="bi bi-person-fill" viewBox="0 0 16 16">
															<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
														</svg>
													</i>
												</div>
											</div>
											<input type="text" class="form-control" id="nome-feed" name="nome-feed" placeholder="Nome" value=<?php echo $row['nome'];?> readonly>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-2">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-envelope text-info">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#17a2b8" class="bi bi-envelope-fill" viewBox="0 0 16 16">
															<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
														</svg>
													</i>
												</div>
											</div>
											<input type="email" class="form-control" id="email-feed" name="email-feed" placeholder="Email" value=<?php echo $row['email'];?> readonly>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-2">
											<textarea class="form-control" name="mensagem-feed" id="mensagem-feed" placeholder="Mensagem"></textarea>
										</div>
									</div>
									<div class="modal-footer">
										<div class="col text-center">
											<input type="submit" value="Enviar" class="btn btn-info">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--------------------------------------------------------------------------------------->
				<!-- MODAL FAÇA UMA PERGUNTA -->
				<div id="modal-pergunta" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<div class="col text-center">
									<h5 class="modal-title" id="titulo-modal">Faça uma pergunta</h5>
								</div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<span id="erro_cadperg"></span>
								<form method="post" action="cadastroPergunta.php" class="mx-auto" onSubmit="return validar();">
									<div class="input-group mb-1">
										<div class="form-label-group">
											<input type="text" name="titulo" class="form-control input" id="titulop" placeholder="Título da pergunta" onkeypress="return letra_numeros()">
											<label for="titulop">Título da pergunta</label>
										</div>
										<div class="input-group-prepend">
											<select name="linguagem" class="form-control" id="ling">
												<option disabled selected>Selecione a linguagem</option>
												<?php
													$resultLinguaguem = "SELECT * FROM linguagem";
													$resultadoLinguagem = mysqli_query($conexao, $resultLinguaguem);
													while($rowLinguagem = mysqli_fetch_assoc($resultadoLinguagem)){ 
												?>
														<option value="<?php echo $rowLinguagem['linguagem']; ?>"><?php echo $rowLinguagem['linguagem']; ?></option> 
												<?php
													}
												?>
											</select> 
										</div>
									</div>
									<div class="form-group">
										<h5>Sua pergunta:</h5>
										<textarea class="form-control" id="area1" name="area1" rows="5"></textarea>
									</div>
									<h5>Seu código:</h5>
									<pre><textarea name="codProgramacao" id="codProgramacao" class="my-xml-editor form-control" data-editor="xml" rows="10"></textarea></pre>
									<script>
										/* ----- Textearea Código ----- */
										$(function() {
											$('textarea[data-editor]').each(function() {
												var textarea = $(this);
												var mode = textarea.data('editor');
												var editDiv = $('<div>', {
													'class': textarea.attr('class')
												})
												.insertBefore(textarea);
												textarea.css('display', 'none');
												var editor = ace.edit(editDiv[0]);
												// editor.renderer.setShowGutter(textarea.data('gutter'));
												editor.getSession().setValue(textarea.val());
												editor.getSession().setMode("ace/mode/" + mode);
												editor.setTheme("ace/theme/monokai");
												textarea.closest('form').submit(function() {
													textarea.val(editor.getSession().getValue());
												})
											});
										});

										//Só aceita letras e números
										// function letra_numeros(){
										// 	var aspas_simples = "'";
										// 	var aspas_duplas = '"'; 
										// 	var sDigitos = "qwertyuiopasdfghjklçzxcvbnmQWERTYUIOPASDFGHJKLÇZXCVBNMáéíóúÁÉÍÓÚâêôÂÊÔãõÃÕ 0123456789?.,´`@#$%¨&*()-+=_ªº°/§;><";
										// 	var cTecla = event.key;
										// 	if(sDigitos.indexOf(cTecla)==-1){
										// 		return false;
										// 	}else{
										// 		return true;
										// 	}
										// }
									</script>
									<br>
									<input type="hidden" name="id" id="id" value=<?php echo $row['IDusuario'];?>>
									<div class="modal-footer">
										<div class="col text-center">
											<button type="submit" class="btn btn-info">Enviar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--------------------------------------------------------------------------------------->
				<!-- MODAL DE SUCESSO DO CADASTRO DA PERGUNTA -->
				<div id="modalSucessPerg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="titulo-modal">Pergunta cadastrada com sucesso!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Agora você tem a opção de visualizar as perguntas cadastradas no site enquanto espera por respostas ou realizar uma nova pergunta. 
							</div>
							<div class="modal-footer">
								<input type="submit" value="Nova pergunta" class="btn btn-info" id="novaPerg"> 
								<input type="submit" value="Visualizar perguntas cadastradas" class="btn btn-info"> 
								<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>	
				<!--------------------------------------------------------------------------------------->
				<!-- FOOTER -->
				<footer class="footer-20192">
					<div class="site-section">
						<div class="container">
							<div class="cta d-block d-md-flex align-items-center px-5">
								<div>
									<h2 class="mb-0">Possui algum feedback?</h2>
									<h3 class="text-dark">Nos informe!</h3>
								</div>
								<div class="ml-auto">
									<a class="btn btn-dark rounded-0 py-3 px-5" data-toggle="modal" data-target="#modal-feedback">Fale conosco</a>
								</div>
							</div>
							<div class="row">
								<div class="col-sm">
									<a href="#" class="footer-logo">Grid System</a>
									<p class="copyright">
										<small>&copy; 2021</small>
									</p>
								</div>
								<div class="col-sm"><br>
									<h3 style="margin-top: 10px;">Desenvolvedores</h3>
									<ul class="list-unstyled links link-inativo">
										<li><a href="#">Leandro Neves</a></li>
										<li><a href="#">Isabella Camargo</a></li>
										<li><a href="#">Kaiky Campos</a></li>
									</ul>
								</div>
								<div class="col-sm"><br>
									<h3 style="margin-top: 10px;">Endereço</h3>
									<ul class="list-unstyled links link-inativo">
										<li><a href="#">Av. Ibirapuera - Jardim Ipaussurama, Campinas - SP, 13060-240</a></li>
									</ul>
								</div>
								<div class="col-sm"><br>
									<h3 id="ctt" style="margin-top: 10px;">Contato</h3>
									<ul class="list-unstyled links link-inativo">
										<li><a href="#">leandro.neves4@senaisp.edu.br</a></li>
										<li><a href="#">isabella.silva87@senaisp.edu.br</a></li>
										<li><a href="#">kaiky.fregolente@senaisp.edu.br</a></li>
										<li><a href="#">+55 (19) 3383-9539</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h3>Redes socias</h3>
									<table>
										<tr>
											<td>
												<a href="https://www.facebook.com/">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-facebook face" viewBox="0 0 16 16">
														<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
													</svg>
												</a>
											<td>
											<td>
												<a href="https://api.whatsapp.com/send?phone=555519991007115&text=Discovery%20Code">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-whatsapp whats" viewBox="0 0 16 16">
														<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
													</svg>
												</a>
											<td>
											<td>
												<a href="https://www.instagram.com/">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-instagram insta" viewBox="0 0 16 16">
														<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
													</svg>
												</a>
											<td>
											<td>
												<a href="https://twitter.com/">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-twitter tt" viewBox="0 0 16 16">
														<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
													</svg>
												</a>
											<td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!------------------------------------------------------------------------------------------->	
				<!-- SCRIPT PARA ABRIR A MENSAGEM DE SUCESSO DO LOGIN AO CARREGAR A PÁGINA //(APENAS 1 VEZ COM LOCAL STORAGE)-->
				<script type="text/javascript">
					$('#msgCadSucesso2').on('shown.bs.modal', function(){
						localStorage.setItem("modal", true);
					});
					$(document).ready(function() {
						var ls = localStorage.getItem("modal");
						if(!ls){
							$('#msgCadSucesso2').modal('show');
						}
					})
					$('.close').click(function(event){
						$('#msgCadSucesso2').fadeOut();
							event.preventDefault();
					});
					$(document).ready(function() {
						var ls = localStorage.getItem("modal");
						if(!ls){
							$('#msgCadSucesso2').modal('show');
						}
					})
					$('#msgCadSucesso2').on('shown.bs.modal', function(){
						localStorage.setItem("modal", false);
					})
					function myFunction(){
						nav.style.background      = "#b8cad4";
					};
					//SCRIPT DA NABAR 			
					//Criando variáveis e mudando cor/elementos da navbar após scroll
					var nav           = document.getElementById('nav');
					var a             = document.getElementById('a');
					var dc            = document.getElementById('DC');
					var btnProcura    = document.getElementById('procura');
					var btnEntrar     = document.getElementById('sair');
					var meuMod        = document.getElementById('addUsuarioModal');
					var email         = document.getElementById('email');
					document.body.onscroll = () => { 
						if (window.pageYOffset > 100) {
							nav.style.background      = "#b8cad4";
							a.style.color             = "black";
							a2.style.color            = "black";
							a3.style.color            = "black";
							a4.style.color            = "black";
							a5.style.color            = "black";
							dc.style.color            = "black";
							btnProcura.style.color    = "black";
							btnProcura.style.border   = "1px solid black";
							btnEntrar.style.color     = "black";
							btnEntrar.style.border    = "1px solid black";
							btnProcura.onmouseover = function() {
								this.style.color = "white";
							}
							btnProcura.onmouseout = function() {
								this.style.color = "black";
							}
							btnEntrar.onmouseover = function() {
								this.style.color = "white";
							}
							btnEntrar.onmouseout = function() {
								this.style.color = "black";
							} 
						}else{                 
							nav.style.background      = "transparent";
							a.style.color             = "white";
							a2.style.color            = "white";
							a3.style.color            = "white";
							a4.style.color            = "white";
							a5.style.color            = "white";
							dc.style.color            = "white";
							btnProcura.style.color    = "white";
							btnProcura.style.border   = "1px solid white";
							btnEntrar.style.color     = "white";
							btnEntrar.style.border    = "1px solid white";
							btnProcura.onmouseover = function() {
								this.style.color  = "black";
								this.style.border = "1px solid black";
							}
							btnProcura.onmouseout = function() {
								this.style.color  = "white";
								this.style.border = "1px solid white";
							}
							btnEntrar.onmouseover = function() {
								this.style.color  = "black";
								this.style.border = "1px solid black";
							}
							btnEntrar.onmouseout = function() {
								this.style.color  = "white";
								this.style.border = "1px solid white";
							} 
						}
					}
					function escolhido() {
						var res = '';
						const items = document.getElementsByName('forma');
						for (var i = 0; i < items.length; i++) {
							if (items[i].checked) {
							res = items[i].value
							break;
							}
						}
						return res;
					}
					//Função MD5 para javascript
					var MD5 = function(d){var r = M(V(Y(X(d),8*d.length)));return r.toLowerCase()};function M(d){for(var _,m="0123456789ABCDEF",f="",r=0;r<d.length;r++)_=d.charCodeAt(r),f+=m.charAt(_>>>4&15)+m.charAt(15&_);return f}function X(d){for(var _=Array(d.length>>2),m=0;m<_.length;m++)_[m]=0;for(m=0;m<8*d.length;m+=8)_[m>>5]|=(255&d.charCodeAt(m/8))<<m%32;return _}function V(d){for(var _="",m=0;m<32*d.length;m+=8)_+=String.fromCharCode(d[m>>5]>>>m%32&255);return _}function Y(d,_){d[_>>5]|=128<<_%32,d[14+(_+64>>>9<<4)]=_;for(var m=1732584193,f=-271733879,r=-1732584194,i=271733878,n=0;n<d.length;n+=16){var h=m,t=f,g=r,e=i;f=md5_ii(f=md5_ii(f=md5_ii(f=md5_ii(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_ff(f=md5_ff(f=md5_ff(f=md5_ff(f,r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+0],7,-680876936),f,r,d[n+1],12,-389564586),m,f,d[n+2],17,606105819),i,m,d[n+3],22,-1044525330),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+4],7,-176418897),f,r,d[n+5],12,1200080426),m,f,d[n+6],17,-1473231341),i,m,d[n+7],22,-45705983),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+8],7,1770035416),f,r,d[n+9],12,-1958414417),m,f,d[n+10],17,-42063),i,m,d[n+11],22,-1990404162),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+12],7,1804603682),f,r,d[n+13],12,-40341101),m,f,d[n+14],17,-1502002290),i,m,d[n+15],22,1236535329),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+1],5,-165796510),f,r,d[n+6],9,-1069501632),m,f,d[n+11],14,643717713),i,m,d[n+0],20,-373897302),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+5],5,-701558691),f,r,d[n+10],9,38016083),m,f,d[n+15],14,-660478335),i,m,d[n+4],20,-405537848),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+9],5,568446438),f,r,d[n+14],9,-1019803690),m,f,d[n+3],14,-187363961),i,m,d[n+8],20,1163531501),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+13],5,-1444681467),f,r,d[n+2],9,-51403784),m,f,d[n+7],14,1735328473),i,m,d[n+12],20,-1926607734),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+5],4,-378558),f,r,d[n+8],11,-2022574463),m,f,d[n+11],16,1839030562),i,m,d[n+14],23,-35309556),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+1],4,-1530992060),f,r,d[n+4],11,1272893353),m,f,d[n+7],16,-155497632),i,m,d[n+10],23,-1094730640),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+13],4,681279174),f,r,d[n+0],11,-358537222),m,f,d[n+3],16,-722521979),i,m,d[n+6],23,76029189),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+9],4,-640364487),f,r,d[n+12],11,-421815835),m,f,d[n+15],16,530742520),i,m,d[n+2],23,-995338651),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+0],6,-198630844),f,r,d[n+7],10,1126891415),m,f,d[n+14],15,-1416354905),i,m,d[n+5],21,-57434055),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+12],6,1700485571),f,r,d[n+3],10,-1894986606),m,f,d[n+10],15,-1051523),i,m,d[n+1],21,-2054922799),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+8],6,1873313359),f,r,d[n+15],10,-30611744),m,f,d[n+6],15,-1560198380),i,m,d[n+13],21,1309151649),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+4],6,-145523070),f,r,d[n+11],10,-1120210379),m,f,d[n+2],15,718787259),i,m,d[n+9],21,-343485551),m=safe_add(m,h),f=safe_add(f,t),r=safe_add(r,g),i=safe_add(i,e)}return Array(m,f,r,i)}function md5_cmn(d,_,m,f,r,i){return safe_add(bit_rol(safe_add(safe_add(_,d),safe_add(f,i)),r),m)}function md5_ff(d,_,m,f,r,i,n){return md5_cmn(_&m|~_&f,d,_,r,i,n)}function md5_gg(d,_,m,f,r,i,n){return md5_cmn(_&f|m&~f,d,_,r,i,n)}function md5_hh(d,_,m,f,r,i,n){return md5_cmn(_^m^f,d,_,r,i,n)}function md5_ii(d,_,m,f,r,i,n){return md5_cmn(m^(_|~f),d,_,r,i,n)}function safe_add(d,_){var m=(65535&d)+(65535&_);return(d>>16)+(_>>16)+(m>>16)<<16|65535&m}function bit_rol(d,_){return d<<_|d>>>32-_}
					$('#btnHtml').on('click', function () {
						//altera o valor dos elementos dentro do modal
						$('#h5').text('Material de apoio HTML');
						$('#valorh5').text('R$ 45,50');
						$('#valorMat').val('45.50');
						$('#nomeMat').val('HTML');
					});
					$('#btnCss').on('click', function () {
						//altera o valor dos elementos dentro do modal
						$('#h5').text('Material de apoio CSS');
						$('#valorh5').text('R$ 39,90');
						$('#valorMat').val('39.90');
						$('#nomeMat').val('CSS');
					});
					$('#btnJq').on('click', function () {
						//altera o valor dos elementos dentro do modal
						$('#h5').text('Material de apoio jQuery');
						$('#valorh5').text('R$ 55,70');
						$('#valorMat').val('55.70');
						$('#nomeMat').val('jQuery');
					});
					$('#btnJs').on('click', function () {
						//altera o valor dos elementos dentro do modal
						$('#h5').text('Material de apoio JS');
						$('#valorh5').text('R$ 39,99');
						$('#valorMat').val('39.99');
						$('#nomeMat').val('JavaScript');
					});		
					//Verificação de campos do formulário de materiais, passando infromações para passagemboleto.php
					$('#formMat').on('submit', function(event){
						const res = escolhido();
						//Hidden
						var senhaBD 		    = document.getElementById('senhac').value;
						//Senha digitada 
						var confirmaSenhaBd     = document.getElementById('confirmaSenhabd').value;
						//Criptografando a senha digitada
						var criptografaSenhaBd  = MD5(confirmaSenhaBd);
						//Valor do documento
						var valorDoc            = document.getElementById('valorMat').value;
						event.preventDefault();
						if(res === ''){
							$("#msg-errormat").html('Necessário informar a forma de pagamento!');
						}else if (res != '' && $('#confirmaSenhabd').val() == "") {
							$("#msg-errormat").html('');
							$("#msg-errorsenha").html('Necessário informar sua senha cadastrada anteriormente!');
						}else if (criptografaSenhaBd != senhaBD) {
							$("#msg-errorsenha").html('A senha não corresponde a cadastrada anteriormente!');
						}else if ($("#forma1").prop("checked")) {
							//FORMA 1 == BOLETO
							var dados = $("#formMat").serialize();
							$.post("passagemboleto.php", dados, function (retorna){
								if(retorna){
									$('#formMat')[0].reset();
									$('#modalmaterialapoio').modal('hide');
									$("#msg-errorsenha").html('');
									$('#modalBoleto').modal('show');
									$("#valorDoc").html('R$ '+valorDoc);
									$("#valorDoc2").html('Valor: R$ '+valorDoc);

								}else{
									
								}
							});
						}else{
							//FORMA 2 == QR Code
							var dados = $("#formMat").serialize();
							$.post("passagemboleto.php", dados, function (retorna){
								if(retorna){
									$('#formMat')[0].reset();
									$('#modalmaterialapoio').modal('hide');
									$("#msg-errorsenha").html('');
									$('#modalQRcode').modal('show');
									// setTimeout(function(){$('#msgCadSucesso2').modal('hide');}, 3000);
								}else{
									
								}
							});
						}
					});
					//Verificação de campos do formulário de feedback, passando infromações para feedback.php
					$('#modalfeedback').on('submit', function(event){
						event.preventDefault();
						if($('#nome-feed').val() == ""){
							$("#msg-error3").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo nome!</div>');						
						}else if($('#email-feed').val() == ""){
							$("#msg-error3").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo email!</div>');							
						}else if($('#mensagem-feed').val() == ""){
							$("#msg-error3").html('<div class="alert alert-danger" role="alert">Necessário informar a mensagem!</div>');							
						}else{
							var dados = $("#modalfeedback").serialize();
							$.post("feedback.php", dados, function (retorna){
								if(retorna){
									$('#modalfeedback')[0].reset();
									$('#modal-feedback').modal('hide');
									$('#msgSucessFeedback').modal('show');
									$("#msg-error3").html('');
								}else{
			
								}
							});
						}
					});
					function validar(){
						var sLinguagem  = document.getElementById("ling").value;
						var codProg     = $(".ace_text").text();
						if($('#titulop').val() == ""){
							$("#erro_cadperg").html('<div class="alert alert-danger" role="alert">Necessário preencher o título da pergunta!</div>');						
							return false;
						}else if(sLinguagem == "Selecione a linguagem"){
							$("#erro_cadperg").html('<div class="alert alert-danger" role="alert">Selecionar uma linguagem!</div>');
							return false;
						}else if($('#area1').val() == ""){
							$("#erro_cadperg").html('<div class="alert alert-danger" role="alert">Preencha o campo da pergunta!</div>');
							return false;
						}else if(codProg == ""){
							$("#erro_cadperg").html('<div class="alert alert-danger" role="alert">Digite ou copie e cole seu código!</div>');
							return false;
						}else{
							return true;
						}
					}
					//QRcode
					$('#modalQRcode').on('shown.bs.modal', function(){
						var GoogleCharts = 'img/meuQRcode.png';
						var imagemQRCode = GoogleCharts;
						$('#imageQRCode').attr('src', imagemQRCode);
					});
					document.getElementById('olho4').addEventListener('mousedown', function() {
						document.getElementById('confirmaSenhabd').type = 'text';
					});
					document.getElementById('olho4').addEventListener('mouseup', function() {
						document.getElementById('confirmaSenhabd').type = 'password';
					});
					// Para que o password não fique exposto apos mover a imagem.
					document.getElementById('olho4').addEventListener('mousemove', function() {
						document.getElementById('confirmaSenhabd').type = 'password';
					});
					function reload(){
						// Recarrega a página atual sem usar o cache
						document.location.reload(true);
					}
				</script>
				<!--------------------------------------------------------------------------------------->
				<script type="text/javascript" src="js/animacao.js"></script>
			</body>
		</html>
<?php
	}else if(isset($_SESSION['adm'])){
?>
		<!DOCTYPE html>
        <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
				<link rel="shortcut icon" type="imagex/png" href="img/logo_endereco.ico">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="css/style.css">
                <title>Página administrativa</title>
            </head>
			<style>
				.container{
					margin-top: 4%;
				}
				#pesquisaUs{
					margin-top: 2%;
				}
				#pesquisa{
					height: 50px;
					width: 400px;
				}
				#opcoesPesq{
					font-size: 14px;
				}
			</style>
			<script>
				//Só aceita números
				function somenteNumeros(){
					var sDigitos ="0123456789,.-()";
					var cTecla = event.key;
					if(sDigitos.indexOf(cTecla)==-1){
						return false;
					}else{
						return true;
					}
				}
				//Só aceita letras
				function somenteLetra(){
					var sDigitos = "qwertyuiopasdfghjklçzxcvbnmQWERTYUIOPASDFGHJKLÇZXCVBNMáéíóúÁÉÍÓÚâêôÂÊÔãõÃÕ ";
					var cTecla = event.key;
					if(sDigitos.indexOf(cTecla)==-1){
						return false;
					}else{
						return true;
					}
				}
				function mCPF(cpf){
					cpf=cpf.replace(/\D/g,"")
					cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
					cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
					cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
					return cpf
				}
				//funções da máscara
				function mascara(obj, func){
					v_obj = obj;
					v_fun = func;
					setTimeout("executamascara()",1);
				}
				function executamascara(){
					v_obj.value=v_fun(v_obj.value);
				}
				window.onload = function(){
					this.document.getElementById("cpf").onkeyup = function(){mascara(this,mCPF)};
					this.document.getElementById("tel").onkeyup = function(){mascara(this,mascTel)};
				}
				//Var do email digitado
				var email = document.getElementById('email');
				//Função para validar email
				function validaEmail(email) {
					var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
					return regex.test(email);
				}
				//Máscara do telefone 
				function mascTel(tel){
					tel=tel.replace(/\D/g,"");
					tel=tel.replace(/^(\d{2})(\d)/g,"($1) $2");
					tel=tel.replace(/(\d)(\d{4})$/,"$1-$2")
					return tel;
				}
				// verificação de cpf
				function isValidCPF(cpf) {
					if (typeof cpf !== "string") return false
					cpf = cpf.replace(/[\s.-]*/igm, '')
					if(
						cpf == "00000000000" ||
						cpf == "11111111111" ||
						cpf == "22222222222" ||
						cpf == "33333333333" ||
						cpf == "44444444444" ||
						cpf == "55555555555" ||
						cpf == "66666666666" ||
						cpf == "77777777777" ||
						cpf == "88888888888" ||
						cpf == "99999999999" 
					){
						//informa cpf === paragrafo de aviso
						id("informaCPF").innerHTML = 'CPF inválido. Tente novamente';
						id('cpf').focus();
					}else{
						id("informaCPF").innerHTML = '';
						var soma = 0;
						var resto;
						for(var i = 1; i <= 9; i++){
							soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
						}    
						resto = (soma * 10) % 11;
						if ((resto == 10) || (resto == 11)){
							resto = 0;
						}
						if (resto != parseInt(cpf.substring(9, 10)) ){
							soma = 0;
							id("informaCPF").innerHTML = 'CPF inválido! Tente novamente.';
							id('cpf').focus();
							
						}
						for (var i = 1; i <= 10; i++){
							soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
						}    
						resto = (soma * 10) % 11
						if ((resto == 10) || (resto == 11)){
							resto = 0;
						}  
						if (resto != parseInt(cpf.substring(10, 11))){
							return false;
						} 
						return true
					} 
				}
				function id(sId){
					return document.getElementById(sId);
				}
				function validacao(){
					var nome     = id("nome").value;
					var email    = id("email").value;
					var tel      = id("tel").value;
					var cpf      = id("cpf").value;
					var inf_cpf  = id("informaCPF").value;
					if (nome=="") {
						id("aviso").innerHTML="<div class='alert alert-danger' role='alert'>É necessário preencher o campo nome!</div>";
						return false;
					}else if (email=="") {
						id("aviso").innerHTML="<div class='alert alert-danger' role='alert'>É necessário preencher o campo email!</div>";
						return false;
					}else if (tel=="") {
						id("aviso").innerHTML="<div class='alert alert-danger' role='alert'>É necessário preencher o campo telefone!</div>";
						return false;
					}else if (cpf=="") {
						id("aviso").innerHTML="<div class='alert alert-danger' role='alert'>É necessário preencher o campo CPF!</div>";
						return false;
					}else{
						return true;
					}	
				}
			</script>
            <body>
				<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
					<span class="navbar-brand">Discovery Code</span>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCenteredExample" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
						<ul class="navbar-nav mb-2 mb-lg-0 menu-leituras nav">
							<li class="leitura active" style="margin-right: 20px;">
								<a data-toggle="tab" href="#controle_usuario" class="text-dark">
									Controle de usuários
								</a>
							</li>
							<li style="margin-right: 20px;">
								<a data-toggle="tab" href="#controle-feedback" class="text-dark">
									Feedbacks
								</a>
							</li>
							<li style="margin-right: 20px;">
								<a data-toggle="tab" href="#material-apoio" class="text-dark">
									Materiais de apoio
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#perg-resp" class="text-dark">
									Perguntas e respostas
								</a>
							</li>
						</ul>
					</div>
					<form class="d-flex">
						<button type="button" class="btn btn-dark" id="sair"  data-toggle="modal" data-target="#logaUsuarioModal" onclick="location.href='logout.php';">Sair</button>
					</form>
				</nav>
                <div class="container">
					<div class="tab-content" style="overflow: visible">
						<div id="controle_usuario" class="tab-pane active">
							<!-- formulário de pesquisa de usuário -->
							<form method="POST" id="form-pesquisa" action="">
								<br>
								<div class="form-label-group" id="formgroupstyle">
									<input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar por usuário(os)">
									<label for="pesquisa">Pesquisar por usuário(os)</label><br>
									<span id="opcoesPesq">A pesquisa pode ser feita através do id, nome, email, telefone ou cpf.</span>
								</div>
							</form>
							<table class='table table-bordered resultado' id="result" style="width: 1500px;">
								<!-- o conteúdo dessa table está vindo de proc_pesq_user.php e de personalizado.js -->
							</table>
							<!-- scripts necessários para a pesquisa de usuário -->
							<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
							<script src="js/personalizado.js"></script>
							<!-- Tabela de todos usuários -->
							<table class='table table-bordered' id="tabela_todos">
								<thead>
									<th class='text-center'>ID</th>
									<th class='text-center'>Nome</th>
									<th class='text-center'>Email</th>
									<th class='text-center'>Telefone</th>
									<th class='text-center'>CPF</th>
									<th class='text-center'>Tipo de usuário</th>
									<th class='text-center'>Editar</th>
									<th class='text-center'>Apagar</th>
								</thead>
								<div id="resp_editmsg">
									<?php
										//isset = se a variável msg é diferente de NULL
										if(isset($_SESSION['msg'])){
											//mostra na tela
											echo $_SESSION['msg']."<br>";
											//unset = destrói a variável msg.
											unset($_SESSION['msg']);
										}
									?>
								</div>
								<?php
									$result_usuarios     = "SELECT * FROM usuario";
									$resultado_usuarios  = mysqli_query($conexao, $result_usuarios);
									while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
										echo "<tbody id='tabela_user'>";
											echo "<td class='text-center'>" . $row_usuario['IDusuario'] . "</td>";
											echo "<td class='text-center'>" . $row_usuario['nome'] . "</td>";
											echo "<td class='text-center'>" . $row_usuario['email'] . "</td>";
											echo "<td class='text-center'>" . $row_usuario['telefone'] . "</td>";
											echo "<td class='text-center'>" . $row_usuario['cpf'] . "</td>";
											$tipous = $row_usuario['tipo'];
											if ($tipous==0) {
												echo "<td class='text-center'>Comum</td>";
											}else {
												echo "<td class='text-center'>Administrador</td>";
											}
											//Link/botão de editar usuário
											//Os data-*atributos são usados ​​para armazenar dados personalizados privados para a página
											echo "<td class='text-center'>";
												echo "<a href='#' data-toggle='modal' data-target='#modal_edita' data-id='".$row_usuario['IDusuario']."' data-nome='".$row_usuario['nome']."' data-email='".$row_usuario['email']."' data-cpf='".$row_usuario['cpf']."'  data-tel='".$row_usuario['telefone']."'  data-tipo='".$row_usuario['tipo']."'>";
													echo "<svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='black' class='bi bi-pencil-fill' viewBox='0 0 16 16'>";
														echo "<path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>";
													echo "</svg>";
												echo "</a>";
											echo "</td>";
											//Link/botão de deletar usuário
											echo "<td class='text-center'>";
												echo "<a href='deleta_usuario.php?IDusuario=" . $row_usuario['IDusuario'] . "' data-confirm='Tem certeza de que deseja excluir?' data-oi='oi'>";
													echo "<svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='black' class='bi bi-trash-fill' viewBox='0 0 16 16'>";
														echo "<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>";
													echo "</svg>";
												echo "</a>";
											echo "</td>";
										echo "</tbody>";
									}
								?>
							</table>
							<!-- Modal que recebe as informações que o script pega -->
							<div class="modal fade" id="modal_edita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4>Editar usuário</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form method="post" action="edita_usuario.php" onsubmit="return validacao()">
											<div class="modal-body">
												<span id="aviso"></span>
												<div class="form-label-group">
													<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" onkeypress="return somenteLetra()">
													<label for="nome">Nome</label>
												</div>
												<div class="form-label-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
													<label for="email">Email</label>
												</div>
												<div class="form-label-group">
													<input type="tel" class="form-control" name="tel" id="tel" placeholder="Telefone" onkeypress='return somenteNumeros();' maxlength='15'>
													<label for="tel">Telefone</label>
												</div>
												<div class="form-label-group">
													<input type="text" class="form-control" id="cpf" name="cpf" onkeypress='return somenteNumeros();' onblur="isValidCPF(this.value);"  maxlength='14' placeholder="CPF">
													<label for="cpf">CPF</label>
													<span id="informaCPF" style="color: #e32636;"></span>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0">
													<label class="form-check-label" for="gridRadios1">Usuário comum</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
													<label class="form-check-label" for="gridRadios2">Administrador</label>
												</div>
												<input type="hidden" name="id" id="id">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-success" id="salva_alteracao">Salvar alterações</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div id="controle-feedback" class="tab-pane">
							<br>
							<table class='table table-bordered'>
								<thead>
									<th class='text-center' style="width: 200px;">Código do feedback</th>
									<th class='text-center'>Nome</th>
									<th class='text-center'>Email</th>
									<th class='text-center'>Mensagem</th>
								</thead>
								<?php
									$result_us     = "SELECT * FROM feedback";
									$resultado_us  = mysqli_query($conexao, $result_us);
									while($row_us = mysqli_fetch_assoc($resultado_us)){
										echo "<tbody id='tabela_user'>";
											echo "<td class='text-center'>" . $row_us['IDfeedback'] . "</td>";
											echo "<td class='text-center'>" . $row_us['nome_usuario'] . "</td>";
											echo "<td class='text-center'>" . $row_us['email_usuario'] . "</td>";
											echo "<td class='text-center'>" . $row_us['mensagem'] . "</td>";
										echo "</tbody>";
									}
								?>
							</table>
						</div>
						<div id="material-apoio" class="tab-pane">
							<br>
							<table class='table table-bordered'>
								<thead>
									<th class='text-center'>Código do curso</th>
									<th class='text-center'>Linguagem</th>
									<th class='text-center'>Usuário</th>
									<th class='text-center'>Valor</th>
									<th class='text-center'>Status do pagamento</th>
								</thead>
								<?php
									$result_cursos     = "SELECT * FROM cursos";
									$resultado_cursos  = mysqli_query($conexao, $result_cursos);
									while($row_cursos = mysqli_fetch_assoc($resultado_cursos)){
										echo "<tbody id='tabela_user'>";
											echo "<td class='text-center'>" . $row_cursos['codCurso'] . "</td>";
											echo "<td class='text-center'>" . $row_cursos['tipo'] . "</td>";
											$idus = $row_cursos['IDusuario'];
											$result_us     = "SELECT * FROM usuario WHERE IDusuario={$idus}";
											$resultado_us  = mysqli_query($conexao, $result_us);
											$row_us = mysqli_fetch_assoc($resultado_us);
											echo "<td class='text-center'>" . $row_us['nome'] . "</td>";
											echo "<td class='text-center'>" . $row_cursos['valor'] . "</td>";
											$stt = $row_cursos['statusPag'];
											if ($stt == 0) {
												echo "<td class='text-center'>Aguardando pagamento...</td>";
											}else{
												echo "<td class='text-center'>Pago</td>";
											}
										echo "</tbody>";
									}
								?>
							</table>
						</div>
						<div id="perg-resp" class="tab-pane">
							<br>
							<table class='table table-bordered'>
								<thead>
									<th class='text-center' style="width: 230px;">Código da pergunta</th>
									<th class='text-center' style="width: 290px;">Usuário</th>
									<th class='text-center' style="width: 280px;">Linguagem da pergunta</th>
									<th class='text-center' style="width: 260px;">Data e hora da pergunta</th>
									<th class='text-center' style="width: 250px;">Status</th>
								</thead>
								<?php
									$result_perg      = "SELECT * FROM pergunta ORDER BY IDpergunta ASC";
									$resultado_perg   = mysqli_query($conexao, $result_perg);
									while($row_perg   = mysqli_fetch_assoc($resultado_perg )){
										echo "<tbody>";
											echo "<td class='text-center'>" . $row_perg['IDpergunta'] . "</td>";
											$idus_perg		    = $row_perg['IDusuario'];
											$result_us_perg     = "SELECT * FROM usuario WHERE IDusuario={$idus_perg}";
											$resultado_us_perg  = mysqli_query($conexao, $result_us_perg);
											$row_us_perg        = mysqli_fetch_assoc($resultado_us_perg);
											echo "<td class='text-center'>" . $row_us_perg['nome'] . "</td>";
											echo "<td class='text-center'>" . $row_perg['linguagem'] . "</td>";

											//Define informações locais 
											setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
											date_default_timezone_set('America/Sao_Paulo');
											$envio_perg         = strtotime($row_perg['dataPerg']);
											$hora_perg          = date("H:i", $envio_perg);
											echo "<td class='text-center'>" .strftime('%d/%m/%Y', strtotime($row_perg['dataPerg'])). " às ".$hora_perg."</td>";
											$IDpergunta         = $row_perg["IDpergunta"];
											$result_resp        = "SELECT * FROM resposta WHERE IDpergunta={$IDpergunta}";
											$resultado_resp     = mysqli_query($conexao, $result_resp);
											$row_resp           = mysqli_fetch_assoc($resultado_resp);
											if ($row_resp["IDpergunta"]==$IDpergunta){
												echo "<td class='text-center'>Respondida</td>";
											}else{
												echo "<td class='text-center'>Aguardando respostas...</td>";
											}
										echo "</tbody>";
									}
								?>
							</table>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->
					<!-- MENSAGEM DE SUCESSO DO LOGIN ADM-->
					<div id="msgCadSucesso2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header bg-success text-center">
									<h5 class="modal-title" id="usuarioModal">Bem-vindo administrador</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Logado com sucesso!
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                <script src="js/confirm_delete.js"></script>
				<script type="text/javascript">
					$('#modal_edita').on('show.bs.modal', function (event) {
						//RelatedTarget = retorna o destino do modal
						var btnModal           = $(event.relatedTarget); //Botão que acionou o modal
						var id                 = btnModal.data('id'); //Pega informação do atributo data-id do link/botão
						var nome      		   = btnModal.data('nome'); //Pega informação do atributo data-nome do link/botão
						var email 			   = btnModal.data('email'); //Pega informação do atributo data-email do link/botão
						var cpf 			   = btnModal.data('cpf'); //Pega informação do atributo data-cpf do link/botão
						var tel 			   = btnModal.data('tel'); //Pega informação do atributo data-tel do link/botão
						var tipo 			   = btnModal.data('tipo'); //Pega informação do atributo data-tipo do link/botão
						var modal 			   = $(this); //Objeto modal 
						//Find() = retorna o valor do elemento
						//No find se encontra os IDs de elementos que já estão dentro do modal 
						//Depois, o valor das variaveis que foram armazenadas através do botão
						//são colocadas no val() dos elementos do modal 
						if (tipo==0) {
							//se tipo de usuário receber 0, o 1º radio button ficará selecionado quando abrirmos o modal
							//ou seja, ele é um usuário comum
							modal.find("#gridRadios1").prop("checked", true);
						}else{
							//se tipo de usuário receber um valor diferente de 0, o 2º radio button ficará selecionado quando abrirmos o modal
							//ou seja, ele é um administrador
							modal.find("#gridRadios2").prop("checked", true);
						}
						//passando valores encontrados para as variáveis dentro do modal 
						modal.find('#id').val(id);
						modal.find('#nome').val(nome);
						modal.find('#email').val(email);
						modal.find('#cpf').val(cpf);
						modal.find('#tel').val(tel);
					});

					$('#msgCadSucesso2').on('shown.bs.modal', function(){
						localStorage.setItem("modal", true);
					});
					$(document).ready(function() {
						var ls = localStorage.getItem("modal");
						if(!ls){
							$('#msgCadSucesso2').modal('show');
						}
					})
					$('.close').click(function(event){
						$('#msgCadSucesso2').fadeOut();
							event.preventDefault();
					});
					$(document).ready(function() {
						var ls = localStorage.getItem("modal");
						if(!ls){
							$('#msgCadSucesso2').modal('show');
						}
					})
					$('#msgCadSucesso2').on('shown.bs.modal', function(){
						localStorage.setItem("modal", false);
					});
				</script>
            </body>
        </html>
<?php 
	}else{
?>
		<!DOCTYPE HTML>
		<html lang="pt-br">  
			<head>  
				<meta charset="utf-8">
				<title>Discovery Code</title>
				<link rel="shortcut icon" type="imagex/png" href="img/logo_endereco.ico">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="css/style.css">
			</head>
			<body>
				<div id="container">
					<!-- NAVBAR -->	
					<nav class="navbar fixed-top navbar-expand-lg" id="nav">
						<div class="container-fluid">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="myFunction();">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
								<img src="img/logo.png" class="img-fluid" alt="Logo Discovery Code" width="75" height="69">
								<a class="navbar-brand" href="index.php" id="DC">Discovery Code</a>
								<div class="mx-auto order-0">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="#imgSobreNos">
												<span class="itensNav" id="a">Sobre nós</span>
											</a>
										</li>
										<li class="nav-item" id="local">
											<a class="nav-link active" href="#localizacao">
												<span class="itensNav" id="a2">Localização</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" href="#ctt" tabindex="-1" aria-disabled="true">
												<span class="itensNav" id="a3">Contato</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" href="listagem.php" tabindex="-1" aria-disabled="true">
												<span class="itensNav" id="a4">Perguntas cadastradas</span>
											</a>
										</li>
									</ul>
								</div>
								<form class="d-flex" method="POST" action="listagem.php">
									<input class="form-control me-2" name="pesquisar" type="search" placeholder="Procurar..." aria-label="Search" id="inputSearch">
									<button type="submit" class="btn btn-outline-secondary" id="procura">Procurar</button>
								</form>                     
								<button type="button" class="btn btn-outline-secondary" id="entrar"  data-toggle="modal" data-target="#logaUsuarioModal">Entre</button>
								<button type="button" class="btn btn-outline-success" data-toggle="modal" id="cadastro" data-target="#addUsuarioModal">Cadastre-se</button>
							</div>
						</div>
					</nav>
					<!--------------------------------------------------------------------------------------->	
					<!-- MODAL DE CADASTRO -->				
					<div id="addUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="col text-center">
										<h5 class="modal-title" id="titulo-modal">Cadastro</h5>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<span id="msg-error"></span>
									<form method="post" id="insert_form" class="form-signin">
										<div class="form-label-group">
											<input type="text" id="nome" name="nome" class="form-control" placeholder="Senha"  onkeypress="return somenteLetra()">
											<label for="nome">Nome</label>
										</div>		
										<div class="form-label-group">
											<input type="email" id="email" name="email" class="form-control" placeholder="Email">
											<label for="email">Email</label>
										</div>
										<div class="form-label-group">
											<input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" onkeypress='return somenteNumeros();' maxlength='15'>
											<label for="telefone">Telefone</label>
										</div>
										<div class="form-label-group">
											<input type="text" onkeypress='return somenteNumeros();' id="cpf" name="cpf" onblur="isValidCPF(this.value);" class="form-control" placeholder="CPF" maxlength='14'>
											<label for="cpf">CPF</label>
											<span id="informaCPF" style="color: #e32636;"></span>
										</div>
										<div class="input-group">
											<div class="form-label-group">
												<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
												<label for="senha">Senha</label>
											</div>  
											<div class="input-group-append">
												<span class="input-group-text" id="basic-addon2">
													<img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho" class="olho">
												</span>
											</div>
										</div>
										<div class="input-group">
											<div class="form-label-group">
												<input type="password" id="confSenha" name="confSenha" class="form-control" placeholder="Senha">
												<label for="confSenha">Confirme sua senha</label>
											</div>  
											<div class="input-group-append">
												<span class="input-group-text" id="basic-addon3">
													<img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho2" class="olho2">
												</span>
											</div>
										</div>
										<div class="modal-footer">
											<div class="col text-center">
												<input type="submit" name="CadUser" id="CadUser" value="Cadastrar" class="btn btn-info">
											</div>
										</div>
										<div class="col text-center">
											Já possui uma conta? <span id="cadAbreLog"><a href="#" id="cadastroPlogin">Clique aqui.</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->	
					<!-- MENSAGEM DE SUCESSO DO CADASTRO -->			
					<div id="msgCadSucesso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header bg-success text-center">
									<h5 class="modal-title" id="usuarioModal">Sucesso no cadastro</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="abreLogX">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Você foi cadastrado com sucesso, agora basta fazer login!
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal" id="abreLogin">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->			
					<!-- MENSAGEM DE SUCESSO DO FEEDBACK -->
					<div id="msgSucessFeedback" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header bg-success text-center">
									<h5 class="modal-title" id="usuarioModal">Enviado com sucesso!</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Nós agradecemos o seu feedback! Até a próxima.
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->
					<!-- MODAL DE LOGIN -->			
					<div id="logaUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="col text-center">
										<h5 class="modal-title" id="titulo-modal">Login</h5>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<span id="msg-error2"></span>
									<span id="erro"></span>
									<form method="post" id="login_form" class="form-signin">
										<div class="form-label-group">
											<input type="email" id="emailLg" name="emailLog" class="form-control" placeholder="Email">
											<label for="emailLg">Email</label>
										</div>
										<div class="input-group">
											<div class="form-label-group">
												<input type="password" id="senhaLg" name="senhaLog" class="form-control" placeholder="Senha">
												<label for="senhaLg">Senha</label>
											</div>  
											<div class="input-group-append">
												<span class="input-group-text" id="basic-addon2">
													<img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho3" class="olho3">
												</span>
											</div>
										</div>
										<div class="modal-footer">
											<div class="col text-center">
												<input type="submit" value="Entrar" name="logar" class="btn btn-info">
											</div>
										</div>
										<div class="col text-center">
											<span id="removeOpc">Não possui uma conta? <span id="logAbreCad"><a href="#" id="loginPcadastro">Clique aqui.</a></span></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->		
					<!-- CAROUSEL/SLIDES -->
					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
						<div class="carousel-inner">
							<div id="fixa">
								<p class="h1" id="titulo">Discovery Code</p>
								<p id="legenda">Encontre aqui sua evolução na programação</p>
							</div>
							<div class="carousel-item active">
								<img src="img/imgCarousel1.jpg" class="d-block w-100" alt="Imagem carousel">
							</div>
							<div class="carousel-item">
								<img src="img/imgCarousel2.jpg" class="d-block w-100" alt="Imagem carousel 2">
							</div>
							<div class="carousel-item">
								<img src="img/imgCarousel3.jpg" class="d-block w-100" alt="Imagem carousel 3">
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->		
					<!-- SOBRE NÓS -->
					<h3 id="sbnos">Sobre nós e nosso propósito</h3>
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td style="text-align: center;">
									<img src="img/gifSobreNos.gif" id="imgSobreNos">
								</td>
							</tr>
							<tr>
								<td id="txtQmsomos">
									Nós da Grid System criamos o site "Discovery Code" para facilitar a vida de programadores, com o nosso site buscamos 
									esclarecer qualquer dúvida a respeito de JavaScript, CSS, Jquery, entre outras linguagens. Para fazer a sua pergunta é bem simples, basta fazer um cadastro
									e abrir a pagina de perguntas e respostas e pronto! Lembrando que com o cadastro você pode responder qualquer outra pergunta, então sempre que souber a
									resposta para a dúvida de um colega não esqueça de responder!! E o mais importante, não tenha vergonha de fazer perguntas, pois outras pessoas possam estar com 
									a mesma dúvida. 
								</td>
							</tr>
						</tbody>
					</table>
					<!--------------------------------------------------------------------------------------->
					<!-- MODAL FEEDBACK -->
					<div id="modal-feedback" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="col text-center">
										<h5 class="modal-title" id="titulo-modal">Contato</h5>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<span id="msg-error3"></span>
									<form method="post" id="modalfeedback" class="form-signin">
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-user text-info">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#17a2b8" class="bi bi-person-fill" viewBox="0 0 16 16">
																<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
															</svg>
														</i>
													</div>
												</div>
												<input type="text" class="form-control" id="nome-feed" name="nome-feed" placeholder="Nome">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-envelope text-info">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#17a2b8" class="bi bi-envelope-fill" viewBox="0 0 16 16">
																<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
															</svg>
														</i>
													</div>
												</div>
												<input type="email" class="form-control" id="email-feed" name="email-feed" placeholder="Email">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group mb-2">
												<textarea class="form-control" name="mensagem-feed" id="mensagem-feed" placeholder="Mensagem"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<div class="col text-center">
												<input type="submit" value="Enviar" class="btn btn-info">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--------------------------------------------------------------------------------------->
					<!-- SCRIPT DA NABAR E DOS MODAIS -->				
					<script>
						//Criando variáveis e mudando cor/elementos da navbar após scroll
						var nav           = document.getElementById('nav');
						var a             = document.getElementById('a');
						var dc            = document.getElementById('DC');
						var btnProcura    = document.getElementById('procura');
						var btnEntrar     = document.getElementById('entrar');
						var btnCad        = document.getElementById('cadastro');
						var meuMod        = document.getElementById('addUsuarioModal');
						var email         = document.getElementById('email');
						function myFunction(){
							nav.style.background      = "#b8cad4";
						};
						document.body.onscroll = () => { 
							if (window.pageYOffset > 100) {
								nav.style.background      = "#b8cad4";
								a.style.color             = "black";
								a2.style.color            = "black";
								a3.style.color            = "black";
								a4.style.color            = "black";
								dc.style.color            = "black";
								btnProcura.style.color    = "black";
								btnProcura.style.border   = "1px solid black";
								btnEntrar.style.color     = "black";
								btnEntrar.style.border    = "1px solid black";
								btnCad.style.color        = "black";
								btnCad.style.border       = "1px solid black";
								btnProcura.onmouseover = function() {
									this.style.color = "white";
								}
								btnProcura.onmouseout = function() {
									this.style.color = "black";
								}
								btnEntrar.onmouseover = function() {
									this.style.color = "white";
								}
								btnEntrar.onmouseout = function() {
									this.style.color = "black";
								} 
								btnCad.onmouseover = function() {
									this.style.color = "white";
								}
								btnCad.onmouseout = function() {
									this.style.color = "black";
								} 
							}else{                 
								nav.style.background      = "transparent";
								a.style.color             = "white";
								a2.style.color            = "white";
								a3.style.color            = "white";
								a4.style.color            = "white";
								dc.style.color            = "white";
								btnProcura.style.color    = "white";
								btnProcura.style.border   = "1px solid white";
								btnEntrar.style.color     = "white";
								btnEntrar.style.border    = "1px solid white";
								btnCad.style.color        = "white";
								btnCad.style.border       = "1px solid white";
								btnProcura.onmouseover = function() {
									this.style.color  = "black";
									this.style.border = "1px solid black";
								}
								btnProcura.onmouseout = function() {
									this.style.color  = "white";
									this.style.border = "1px solid white";
								}
								btnEntrar.onmouseover = function() {
									this.style.color  = "black";
									this.style.border = "1px solid black";
								}
								btnEntrar.onmouseout = function() {
									this.style.color  = "white";
									this.style.border = "1px solid white";
								} 
								btnCad.onmouseover = function() {
									this.style.color  = "black";
									this.style.border = "1px solid black";
								}
								btnCad.onmouseout = function() {
									this.style.color  = "white";
									this.style.border = "1px solid white";
								} 
							}
						}
						//Verificação de campos do formulário de cadastro, passando infromações para cadastro.php
						$('#insert_form').on('submit', function(event){
							event.preventDefault();
							if($('#nome').val() == ""){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo nome!</div>');
							}else if($('#email').val() == ""){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo email!</div>');						
							}else if(!validaEmail($('#email').val())){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário um email válido!</div>');		
							}else if($('#telefone').val() == ""){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo telefone!</div>');						
							}else if($('#telefone').val().length < 14){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Dígitos insuficientes no campo telefone!</div>');	
							}else if($('#cpf').val() == ""){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo cpf!</div>');						
							}else if($('#senha').val() == ""){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo senha!</div>');						
							}else if($('#senha').val().length < 8){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">A senha deve possuir no mínimo 8 caracteres!</div>');	
							}else if($('#confSenha').val() == ""){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo de confirmação de senha!</div>');						
							}else if($('#senha').val() != $('#confSenha').val()){
								$("#msg-error").html('<div class="alert alert-danger" role="alert">As senhas são diferentes!</div>');		
							}else{
								var dados = $("#insert_form").serialize();
								$.post("cadastrar.php", dados, function (retorna){
									if(retorna == 0){
										$('#insert_form')[0].reset();
										$('#addUsuarioModal').modal('hide');
										$('#msgCadSucesso').modal('show');
										$("#msg-error").html('');	
									}else if(retorna == 1){
										$("#msg-error").html('<div class="alert alert-danger" role="alert">O email informado já foi cadastrado no site!</div>');	
									}
								});
							}
						});
						//Verificação de campos do formulário de login, passando infromações para login.php
						$('#login_form').on('submit', function(event){
							event.preventDefault();
							if($('#emailLg').val() == ""){
								$("#msg-error2").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo email!</div>');						
								$("#erro").html("");
							}else if($('#senhaLg').val() == ""){
								$("#msg-error2").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo senha!</div>');							
								$("#erro").html("");
							}else{
								var dados = $("#login_form").serialize();
								$.post("login.php", dados, function (retorna){
									if(retorna){
										if (retorna == 0) {
											//alert("recebeu usuario normal");
											//atualiza a página
											location.reload();
										}else if (retorna == 1){
											//alert("recebeu adm");
											//atualiza a página
											location.reload();
										}else{
											$("#msg-error2").html("");
											$("#erro").html('<div class="alert alert-danger" role="alert">Usuário não encontrado! Por favor, revise seus dados e tente novamente.</div>');
										}
									}else{

									}
								});
							}
						});
						//Verificação de campos do formulário de feedback, passando infromações para feedback.php
						$('#modalfeedback').on('submit', function(event){
							event.preventDefault();
							if($('#nome-feed').val() == ""){
								$("#msg-error3").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo nome!</div>');						
							}else if($('#email-feed').val() == ""){
								$("#msg-error3").html('<div class="alert alert-danger" role="alert">Necessário preencher o campo email!</div>');							
							}else if($('#mensagem-feed').val() == ""){
								$("#msg-error3").html('<div class="alert alert-danger" role="alert">Necessário informar a mensagem!</div>');							
							}else{
								var dados = $("#modalfeedback").serialize();
								$.post("feedback.php", dados, function (retorna){
									if(retorna){
										$('#modalfeedback')[0].reset();
										$('#modal-feedback').modal('hide');
										$('#msgSucessFeedback').modal('show');
										$("#msg-error3").html('');
									}else{
				
									}
								});
							}
						});
						if ($('#testando').click(function() {
							$("#msg").html('<div class="alert alert-warning alert-dismissible" role="alert">Necessário estar logado! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ');
						}));
						//Ifs para abrir ou fechar modais de acordo com o clique do usuário
						if ($('#abreLogin').click(function() {
							$('#msgCadSucesso').modal('hide');
							$('#logaUsuarioModal').modal('show');
							$("#removeOpc").html('');
						}));
						if ($('#abreLogX').click(function() {
							$('#msgCadSucesso').modal('hide');
							$('#logaUsuarioModal').modal('show');
							$("#removeOpc").html('');
						}));
						if ($('#cadAbreLog').click(function() {
							$('#addUsuarioModal').modal('hide');
							$('#logaUsuarioModal').modal('show');
						}));
						if ($('#logAbreCad').click(function() {
							$('#logaUsuarioModal').modal('hide');
							$('#addUsuarioModal').modal('show');
						}));
						//Só aceita letras
						function somenteLetra(){
							var sDigitos = "qwertyuiopasdfghjklçzxcvbnmQWERTYUIOPASDFGHJKLÇZXCVBNMáéíóúÁÉÍÓÚâêôÂÊÔãõÃÕ ";
							var cTecla = event.key;
							if(sDigitos.indexOf(cTecla)==-1){
								return false;
							}else{
								return true;
							}
						}
						//Só aceita números
						function somenteNumeros(){
							var sDigitos ="0123456789,.-()";
							var cTecla = event.key;
							if(sDigitos.indexOf(cTecla)==-1){
								return false;
							}else{
								return true;
							}
						}
						//Máscara do telefone 
						function mascTel(tel){
							tel=tel.replace(/\D/g,"");
							tel=tel.replace(/^(\d{2})(\d)/g,"($1) $2");
							tel=tel.replace(/(\d)(\d{4})$/,"$1-$2")
							return tel;
						}
						function mCPF(cpf){
							cpf=cpf.replace(/\D/g,"")
							cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
							cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
							cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
							return cpf
						}
						//funções da máscara
						function mascara(obj, func){
							v_obj = obj;
							v_fun = func;
							setTimeout("executamascara()",1);
						}
						function executamascara(){
							v_obj.value=v_fun(v_obj.value);
						}
						window.onload = function(){
							this.document.getElementById("telefone").onkeyup = function(){mascara(this,mascTel)};
							this.document.getElementById("cpf").onkeyup = function(){mascara(this,mCPF)};
						}
						//Função para validar email
						function validaEmail(email) {
							var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
							return regex.test(email);
						}
						// verificação de cpf
						function isValidCPF(cpf) {
							if (typeof cpf !== "string") return false
							cpf = cpf.replace(/[\s.-]*/igm, '')
							if(
								cpf == "00000000000" ||
								cpf == "11111111111" ||
								cpf == "22222222222" ||
								cpf == "33333333333" ||
								cpf == "44444444444" ||
								cpf == "55555555555" ||
								cpf == "66666666666" ||
								cpf == "77777777777" ||
								cpf == "88888888888" ||
								cpf == "99999999999" 
							){
								//informa cpf === paragrafo de aviso
								id("informaCPF").innerHTML = 'CPF inválido. Tente novamente';
								id('cpf').focus();
							}else{
								id("informaCPF").innerHTML = '';
								var soma = 0;
								var resto;
								for(var i = 1; i <= 9; i++){
									soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
								}    
								resto = (soma * 10) % 11;
								if ((resto == 10) || (resto == 11)){
									resto = 0;
								}
								if (resto != parseInt(cpf.substring(9, 10)) ){
									soma = 0;
									id("informaCPF").innerHTML = 'CPF inválido! Tente novamente.';
									id('cpf').focus();
									
								}
								for (var i = 1; i <= 10; i++){
									soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
								}    
								resto = (soma * 10) % 11
								if ((resto == 10) || (resto == 11)){
									resto = 0;
								}  
								if (resto != parseInt(cpf.substring(10, 11))){
									return false;
								} 
								return true
							} 
						}
						function id(sId){
							return document.getElementById(sId);
						}
						//Adiciona mais telefones
						// contTelefone = 1;
						// function add_row(){
						// 	$rowno=$("#employee_table tr").length;
						// 	$rowno=$rowno+1;
						// 	$("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' maxlength='15' class='form-control' placeholder='Outro telefone' id='telefone"+contTelefone+"' name='telefone"+contTelefone+"' onkeypress='return somenteNumeros();'></td><td><button type='button' class='btn btn-outline-secondary' id='removeInput' onclick=delete_row('row"+$rowno+"')><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'><path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'></path></svg></button></td></tr>");
						// 	this.document.getElementById("telefone"+contTelefone).onkeyup = function(){mascara(this,mascTel)};
						// 	contTelefone++;
						// 	document.getElementById("contTelefone").value = contTelefone;
						// }
						// function delete_row(rowno) {
						// 	$('#'+rowno).remove();
						// }
						// document.getElementById(rowno).remove();
						document.getElementById('olho').addEventListener('mousedown', function() {
							document.getElementById('senha').type = 'text';
						});
						document.getElementById('olho').addEventListener('mouseup', function() {
							document.getElementById('senha').type = 'password';
						});
						// Para que o password não fique exposto apos mover a imagem.
						document.getElementById('olho').addEventListener('mousemove', function() {
							document.getElementById('senha').type = 'password';
						});
						document.getElementById('olho2').addEventListener('mousedown', function() {
							document.getElementById('confSenha').type = 'text';
						});
						document.getElementById('olho2').addEventListener('mouseup', function() {
							document.getElementById('confSenha').type = 'password';
						});
						// Para que o password não fique exposto apos mover a imagem.
						document.getElementById('olho2').addEventListener('mousemove', function() {
							document.getElementById('confSenha').type = 'password';
						});
						document.getElementById('olho3').addEventListener('mousedown', function() {
							document.getElementById('senhaLg').type = 'text';
						});
						document.getElementById('olho3').addEventListener('mouseup', function() {
							document.getElementById('senhaLg').type = 'password';
						});
						// Para que o password não fique exposto apos mover a imagem.
						document.getElementById('olho3').addEventListener('mousemove', function() {
							document.getElementById('senhaLg').type = 'password';
						});
						// $(function(){ // declaro o início do jquery
						// 	$("input[name='logar']").on('click', function(){ //botão para disparar a ação
						// 		var emailUsuario = $("input[name='emailLog']").val();
						// 		$.post('index.php',function(data){
						// 			$('#resultado').html(data);//onde vou escrever o resultado
						// 		});
						// 	});
						// });// fim do jquery
					</script>
					<!--------------------------------------------------------------------------------------->	
					<!-- SECTIONS DOS MATERIAS DE APOIO -->
					<h2 id="MaterialApoio">Materias de apoio</h2>
					<!-- MODAL MATERIAL DE APOIO -->
					<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title alert alert-warning" id="exampleModalLabel">É necessário realizar login!</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Faça login para descobrir seus valores e poder realizar a compras desses materias.
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					<section class="anime" id="matApoio">
						<div class="grid-text">
							<h2>HTML</h2>
							<p>No material de apoio sobre HTML você irá aprender códigos para estruturar uma página web e seu conteúdo. Por exemplo, conteúdos em parágrafos, em uma lista com marcadores ou usando imagens e tabelas.</p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">Adquirir</button>
						</div>
						<div class="grid-img img-left">
							<img src="img/html.png" class="img-fluid" width="135px" alt="Imagem HTML">
						</div>
					</section>
					<section class="anime2" id="matApoio">
						<div class="grid-img img-right">
							<img src="img/css.png" class="img-fluid" width="132px" alt="Imagem CSS">
						</div>
						<div class="grid-text">
							<h2>CSS</h2>
							<p>Nesse material você irá aprender a estilizar as páginas desenvolvidas com HTML. Definindo a aparência de cada página, alterando seu layout, o posicionamento dos elementos, fontes, cores e outras opções visuais. </p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">Adquirir</button>
						</div>
					</section>
					<section class="anime" id="matApoio">
						<div class="grid-text">
							<h2>jQuery</h2>
							<p>Com o material de apoio sobre jQuery você irá aprender como manipular os elementos a partir de interações do usuário. Reforçando os fundamentos do JS, a sintaxe, variáveis, funções, objetos e outros elementos básicos.</p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">Adquirir</button>
						</div>
						<div class="grid-img img-left">
							<img src="img/jquery_logo.png" class="img-fluid" width="180px" alt="Imagem Jquery">
						</div>
					</section>
					<section class="anime2" id="matApoio">
						<div class="grid-img img-right">
							<img src="img/js.png" class="img-fluid" width="135px" alt="Imagem JavaScript">
						</div>
						<div class="grid-text">
							<h2>JavaScript</h2>
							<p>No material de apoio sobre JavaScript você irá aprender como incluir, em uma página estática, elementos dinâmicos como mapas, formulários, operações numéricas, animações, infográficos interativos e muito mais. </p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">Adquirir</button>
						</div>
					</section>
					<!--------------------------------------------------------------------------------------->	
					<!-- LOCALIZAÇÃO -->
					<h2 id="localizacao">Localização</h2>
					<div id="googleMaps">
						<div class="map-responsive">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.7653989187606!2d-47.1146574850341!3d-22.91691718500672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c871fe37db6b%3A0x8affcb8e31e64b0f!2sAv.%20Ibirapuera%20-%20Campinas%2C%20SP%2C%2013060-240!5e1!3m2!1spt-BR!2sbr!4v1630547039319!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
					<p id="endereco">Av. Ibirapuera - Jardim Ipaussurama <br> Campinas - SP <br> 13060-240</p>
					<!--------------------------------------------------------------------------------------->		
				</div>
				<br><br><br>
				<!-- FOOTER -->
				<footer class="footer-20192">
					<div class="site-section">
						<div class="container">
							<div class="cta d-block d-md-flex align-items-center px-5">
								<div>
									<h2 class="mb-0">Possui algum feedback?</h2>
									<h3 class="text-dark">Nos informe!</h3>
								</div>
								<div class="ml-auto">
									<a class="btn btn-dark rounded-0 py-3 px-5" data-toggle="modal" data-target="#modal-feedback">Fale conosco</a>
								</div>
							</div>
							<div class="row">
								<div class="col-sm">
									<a href="#" class="footer-logo">Grid System</a>
									<p class="copyright">
										<small>&copy; 2021</small>
									</p>
								</div>
								<div class="col-sm"><br>
									<h3 style="margin-top: 10px;">Desenvolvedores</h3>
									<ul class="list-unstyled links link-inativo">
										<li><a href="#">Leandro Neves</a></li>
										<li><a href="#">Isabella Camargo</a></li>
										<li><a href="#">Kaiky Campos</a></li>
									</ul>
								</div>
								<div class="col-sm"><br>
									<h3 style="margin-top: 10px;">Endereço</h3>
									<ul class="list-unstyled links link-inativo">
										<li><a href="#">Av. Ibirapuera - Jardim Ipaussurama, Campinas - SP, 13060-240</a></li>
									</ul>
								</div>
								<div class="col-sm"><br>
									<h3 id="ctt" style="margin-top: 10px;">Contato</h3>
									<ul class="list-unstyled links link-inativo">
										<li><a href="#">leandro.neves4@senaisp.edu.br</a></li>
										<li><a href="#">isabella.silva87@senaisp.edu.br</a></li>
										<li><a href="#">kaiky.fregolente@senaisp.edu.br</a></li>
										<li><a href="#">+55 (19) 3383-9539</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h3>Redes socias</h3>
									<table>
										<tr>
											<td>
												<a href="https://www.facebook.com/">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-facebook face" viewBox="0 0 16 16">
														<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
													</svg>
												</a>
											<td>
											<td>
												<a href="https://api.whatsapp.com/send?phone=555519991007115&text=Discovery%20Code">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-whatsapp whats" viewBox="0 0 16 16">
														<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
													</svg>
												</a>
											<td>
											<td>
												<a href="https://www.instagram.com/">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-instagram insta" viewBox="0 0 16 16">
														<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
													</svg>
												</a>
											<td>
											<td>
												<a href="https://twitter.com/">
													<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="gray" class="bi bi-twitter tt" viewBox="0 0 16 16">
														<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
													</svg>
												</a>
											<td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!------------------------------------------------------------------------------------------->	
				<script type="text/javascript" src="js/animacao.js"></script>
			</body>
		</html>
<?php 
	}
?>