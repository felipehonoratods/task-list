<?php
  include("conexao.php");

  if(isset($_POST[cadastrar])) {
    $novologin = $_POST['login'];
    $novasenha = $_POST['senha'];

    $sql_code = "SELECT senha, id FROM usuario WHERE login = '$novologin'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $data = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;

    if($total == 0) {
      $sql_code = "INSERT INTO usuario(login, senha) VALUES ('$novologin', '$novasenha')";
      $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    } else {
      $erro[] = "Login já cadastrado";
    }
    if(count($erro) == 0 || !isset($erro)) {
      echo "<script>alert('Cadastrado com sucesso!'); location.href='../index.php';</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Cadastro</title>
</head>
<body>
  <?php if(count($erro) > 0)
      foreach($erro as $msg){
        echo "<p>$msg</p>";
      }
  ?>
  <header class="d-flex justify-content-center">
    <h1>Cadastro de Novo Usuário</h1>
  </header>
  <div class="d-flex justify-content-center">
      <form method="POST" action="">
        <div class="form-group">
          <label>Novo Login</label>
          <input type="text" name="login" class="form-control" placeholder="Seu login">
        </div>
        <div class="form-group">
          <label>Nova Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Senha">
        </div>
        <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>