<?php
  error_reporting(0);
  include("conexao.php");

  if(isset($_POST['cadastrar'])) {
    if(!isset($_SESSION))
      session_start();

    foreach($_POST as $chave=>$valor) {
      $_SESSION[$chave] = $mysqli->real_escape_string($valor);
    }

    if(strlen($_SESSION['titulo']) == 0)
      $erro[] = "Preencha o Título";
    
    if(strlen($_SESSION['descricao']) == 0)
      $erro[] = "Preencha a Descrição";
    
    if(strlen($_SESSION['id_usuario']) == 0)
      $erro[] = "Preencha o Identificador";
   
    if(strlen($_SESSION['status']) == 0)
      $erro[] = "Preencha o Status da Tarefa";

    if(count($erro) == 0){
      $sql_code = "INSERT INTO tarefa (
        titulo, 
        descricao, 
        data_hora_inicio, 
        id_usuario, 
        status) 
        VALUES(
          '$_SESSION[titulo]',
          '$_SESSION[descricao]',
          NOW(),
          '$_SESSION[id_usuario]',
          '$_SESSION[status]'
        )";
      $confirma = $mysqli->query($sql_code) or die($mysqli->error);

      if($confirma) {
        unset($_SESSION[titulo],
        $_SESSION[descricao],
        $_SESSION[data_hora_inicio],
        $_SESSION[id_usuario],
        $_SESSION[status]);

        echo "<script>alert('Cadastrado com sucesso!'); location.href='tarefas.php?p=view'; </script>";
      } else {
        $erro[] = $confirma;
      }
    }
  }

?>

<?php if(count($erro) > 0) {
  echo "<div class='erro'>";
  foreach($erro as $valor){
    echo "$valor <br>";
  }
  echo "</div>";
}
?>
<div class="d-flex justify-content-center">
<a href="tarefas.php?p=view" class="btn btn-link">Voltar</a>
</div>
<div class="d-flex justify-content-center">
<form method="POST" action="tarefas.php?p=create">
  <div class="form-group">
    <label name="titulo">Título</label>
    <input name="titulo" type="text" class="form-control" require placeholder="Título da tarefa">
  </div>
  <div class="form-group">
    <label name="descricao">Descrição</label>
    <textarea name="descricao" require class="form-control" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Identificador de Usuário</label>
    <input name="id_usuario" require type="text" class="form-control" placeholder="id">
  </div>
  <div class="form-group">
    <label name="status">Status</label>
    <select name="status" class="form-control">
      <option value="">Selecione</option>
      <option value="1">Feito</option>
      <option value="2">Não Feito</option>
    </select>
  </div>
  <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>