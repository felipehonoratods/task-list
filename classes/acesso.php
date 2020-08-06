<?php 

if(isset($_POST['login']) && strlen($_POST['login']) > 0) {

  if(!isset($_SESSION))
    session_start();

    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = $_POST['senha'];

    $sql_code = "SELECT senha, id FROM usuario WHERE login = '$_SESSION[login]'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $data = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;

    if($total == 0) {
      $erro[] = "Login não correspondente!";
    } else {
      if($data['senha'] == $_SESSION['senha']) {
        $_SESSION['usuario'] = $data['id'];
      } else {
        $erro[] = "Senha incorreta!";
      }
    }
    
    if(count($erro) == 0 || !isset($erro)) {
      echo "<script>alert('Logado com sucesso!'); location.href='classes/tarefas.php';</script>";
    }
}

?>