<?php
    include_once 'conexao.php';
    
    if(!empty(@$_POST["codProgramacao2"])){
        $resposta        = filter_input(INPUT_POST,'resposta', FILTER_SANITIZE_STRING);
        $codProgramacao  = filter_var(@$_POST['codProgramacao2'], FILTER_SANITIZE_MAGIC_QUOTES);
        $id_us           = filter_input(INPUT_POST,'id_usu_resp', FILTER_SANITIZE_STRING);
        $IDpergunta      = filter_input(INPUT_POST,'idperg', FILTER_SANITIZE_STRING);
        $query   		 = "INSERT INTO resposta(IDusuario,IDpergunta,resposta,codProgramacao,dataResp) VALUES ('$id_us','$IDpergunta','$resposta','$codProgramacao', NOW())";
        $insert  		 = mysqli_query($conexao, $query);
        if($insert){
            echo true;
            echo "<script language='javascript' type='text/javascript'>";
                echo "alert('Sua resposta foi registrada!');";
                echo "window.location.href='detalhes.php?ID_pergunta=$IDpergunta'";
            echo "</script>";
        }else{
            echo false;
        }
    }else{
        $IDpergunta      = filter_input(INPUT_POST,'idperg', FILTER_SANITIZE_STRING);
        echo "<script>alert('O campo código é obrigatório!');</script>";
        echo "<script>window.location.href='detalhes.php?ID_pergunta=$IDpergunta';</script>";
    }
?>