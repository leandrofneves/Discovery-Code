<?php 
  session_start();
  include_once 'conexao.php';

  $email    = filter_input(INPUT_POST, 'emailLog', FILTER_SANITIZE_STRING);
  $senha    = filter_input(INPUT_POST, 'senhaLog', FILTER_SANITIZE_STRING);

  $query    = "SELECT * from usuario where email = '{$email}' and senha = md5('{$senha}');";
  $result   = mysqli_query($conexao, $query);
  $array    = mysqli_fetch_array($result);

  if(is_array($array)){
    $tipo = $array["tipo"];
    if ($tipo == 0) {
      $_SESSION["emailLog"]  = $array["email"];
      $_SESSION["senhaLog"]  = $array["senha"];
      $_SESSION["normal"]    = true;
      setcookie("idUs",$array["IDusuario"], time()+86400, '/');
      echo "0";
    }else if ($tipo == 1) {
      $_SESSION["emailLog"]  = $array["email"];
      $_SESSION["senhaLog"]  = $array["senha"];
      $_SESSION["adm"]       = true;
      setcookie("idUs",$array["IDusuario"], time()+86400, '/');
      echo "1";
    }
  }else{
    echo "2";
  }
?> 