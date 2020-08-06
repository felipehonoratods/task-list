<?php 

error_reporting(0);
include("classes/conexao.php"); 
include("classes/acesso.php");

?>

<!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Desafio</title>
  </head>
  <body>
    <?php if(count($erro) > 0)
      foreach($erro as $msg){
        echo "<p>$msg</p>";
      }
    ?>
    <header class="d-flex justify-content-center">
      <h1>Desafio DEV WEB</h1>
    </header>
    <div class="d-flex justify-content-center">
      <form method="POST" action="">
        <div class="form-group">
          <label>Login</label>
          <input type="text" name="login" class="form-control" placeholder="Seu login">
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>
    <div class="d-flex justify-content-center">
      <a href="classes/cadastro.php" target="_blank" class="btn btn-link">Cadastrar-se</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>