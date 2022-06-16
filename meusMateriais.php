<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meus materiais</title>
        <link rel="shortcut icon" type="imagex/png" href="img/logo_endereco.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!--CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <style>
        #procura,#sair{
            border-color: black;
            color: black;
        }
        #procura:hover, #sair:hover{
            color: white;
        }
    </style>
    <body>
        <div id="container">
            <!-- NAVBAR -->	
            <nav class="navbar fixed-top navbar-expand-lg" id="nav" style="background-color: #b8cad4;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <img src="img/logo.png" class="img-fluid" alt="Logo Discovery Code" width="75" height="69">
                        <a class="navbar-brand" href="index.php" id="DC" style="color: black;">Discovery Code</a>
                        <div class="mx-auto order-0">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#ctt" tabindex="-1" aria-disabled="true">
                                        <span class="itensNav" id="a3" style="color: black;">Contato</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php" tabindex="-1" aria-disabled="true">
                                        <span class="itensNav" id="a4" style="color: black;">Página inicial</span>
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
            <br><br><br>
            <?php 
                include_once "conexao.php";
                $id_cookie        = $_COOKIE['idUs'];
                $result_curso     = "SELECT * FROM cursos WHERE IDusuario=".$_COOKIE['idUs'];
                $resultado_curso  = mysqli_query($conexao, $result_curso);
            
                if(($resultado_curso) AND ($resultado_curso->num_rows != 0 )){
                    ?>
                        <table class="table table-bordered" style="width: 600px!important; margin: auto;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class='text-center'>Curso(s) adquirido(s)</th>
                                    <th scope="col" class='text-center'>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                            <br><br><br><br>
                    <?php
                        while($row_curso = mysqli_fetch_assoc($resultado_curso)){
                            if ($row_curso["tipo"]=="HTML" && $row_curso["statusPag"]==1) {
                                echo "<tr>";
                                    echo "<td class='text-center'>";
                                        echo "HTML"; 
                                    echo"</td>";
                                    echo "<td class='text-center'>";
                                        echo "<form id='meuform' name='meuform' action='pdfMaterialApoio.php' method='post'>";
                                            echo "<input type='hidden' value='HTML' name='test' id='test'>";
                                            echo "<a href='#' onclick='document.meuform.submit(); return false;' style='color: blue;'><u>Material HTML</u></a>";
                                        echo "</form>";
                                    echo "</td>";  
                            }else if($row_curso["tipo"]=="HTML" && $row_curso["statusPag"]==0){
                                echo "<tr>";
                                echo "<td class='text-center'>";
                                    echo "HTML"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "Aguardando pagamento...";;
                                echo "</td>";  
                            }
                            if ($row_curso["tipo"]=="CSS" && $row_curso["statusPag"]==1) {
                                echo "<td class='text-center'>";
                                    echo "CSS"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "<form id='meuform2' name='meuform2' action='pdfMaterialApoio.php' method='post'>";
                                        echo "<input type='hidden' value='CSS' name='test' id='test'>";
                                        echo "<a href='#' onclick='document.meuform2.submit(); return false;' style='color: blue;'><u>Material CSS</u></a>";
                                    echo "</form>";
                                echo "</td>";
                            }else if($row_curso["tipo"]=="CSS" && $row_curso["statusPag"]==0){
                                echo "<tr>";
                                echo "<td class='text-center'>";
                                    echo "CSS"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "Aguardando pagamento...";;
                                echo "</td>";  
                            }
                            if ($row_curso["tipo"]=="jQuery" && $row_curso["statusPag"]==1) {
                                echo "<td class='text-center'>";
                                    echo "JQuery"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "<form id='meuform3' name='meuform3' action='pdfMaterialApoio.php' method='post'>";
                                        echo "<input type='hidden' value='JQUERY' name='test' id='test'>";
                                        echo "<a href='#' onclick='document.meuform3.submit(); return false;' style='color: blue;'><u>Material JQuery</u></a>";
                                    echo "</form>";
                                echo "</td>";
                            }else if($row_curso["tipo"]=="jQuery" && $row_curso["statusPag"]==0){
                                echo "<tr>";
                                echo "<td class='text-center'>";
                                    echo "JQuery"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "Aguardando pagamento...";;
                                echo "</td>";  
                            }
                            if ($row_curso["tipo"]=="JavaScript" && $row_curso["statusPag"]==1) {
                                echo "<td class='text-center'>";
                                    echo "JavaScript"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "<form id='meuform4' name='meuform4' action='pdfMaterialApoio.php' method='post'>";
                                        echo "<input type='hidden' value='JAVASCRIPT' name='test' id='test'>";
                                        echo "<a href='#' onclick='document.meuform4.submit(); return false;' style='color: blue;'><u>Material JavaScript</u></a>";
                                    echo "</form>";
                                echo "</td>";
                            }else if($row_curso["tipo"]=="JavaScript" && $row_curso["statusPag"]==0){
                                echo "<tr>";
                                echo "<td class='text-center'>";
                                    echo "JavaScript"; 
                                echo"</td>";
                                echo "<td class='text-center'>";
                                    echo "Aguardando pagamento...";;
                                echo "</td>";  
                            }
                            echo "</tr>";
                        }
                    ?>
                            </tbody>
                        </table>
                        <br><br><br><br><br><br>
                    <?php
                }else{
                    
					
						
					
                    echo "<br><br><br><br><br><br><div class='container d-flex justify-content-center' role='main' style='text-align: center;'><div style='width: 350px; top: 50%;'><div class='alert alert-info' style='text-align: center; width: 300px;' role='alert'>Nenhum material encontrado.</div></div></div><br><br><br>";
                }					
            ?>
        
            <br><br><br><br><br><br>
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
            <script>
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
            </script>
        </div>
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
    </body>
</html>