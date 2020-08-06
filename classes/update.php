<?php
  error_reporting(0);
  include("conexao.php");

  $taf_id = intval($_GET['tarefa']);

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
      $sql_code = "UPDATE tarefa SET
        titulo = '$_SESSION[titulo]', 
        descricao = '$_SESSION[descricao]', 
        data_hora_termino = NOW(), 
        id_usuario = '$_SESSION[id_usuario]', 
        status = '$_SESSION[status]' WHERE tarefa.id = '$taf_id'";
      $confirma = $mysqli->query($sql_code) or die($mysqli->error);

      if($confirma) {
        unset($_SESSION[titulo],
        $_SESSION[descricao],
        $_SESSION[data_hora_termino],
        $_SESSION[id_usuario],
        $_SESSION[status]);

        echo "<script>alert('Alterado com sucesso!'); location.href='tarefas.php?p=view'; </script>";
      } else {
        $erro[] = $confirma;
      }
    }
  }else {
    $sql_code = "SELECT * FROM tarefa WHERE id = '$taf_id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $line = $sql_query->fetch_assoc(0);

    if(!isset($_SESSION))
      session_start();

    $_SESSION[titulo] = $line['titulo'];
    $_SESSION[descricao] = $line['descricao'];
    $_SESSION[data_hora_termino] = $line['data_hora_termino'];
    $_SESSION[id_usuario] = $line['id_usuario'];
    $_SESSION[status] = $line['status'];
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
<form method="POST" action="tarefas.php?p=update&tarefa=<?php echo $taf_id; ?>">
  <div class="form-group">
    <label name="titulo">Título</label>
    <input value="<?php echo $_SESSION[titulo] ?>" name="titulo" type="text" class="form-control" require placeholder="Título da tarefa">
  </div>
  <div class="form-group">
    <label name="descricao">Descrição</label>
    <textarea value="<?php echo $_SESSION[descricao] ?>" name="descricao" require class="form-control" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Identificador de Usuário</label>
    <input value="<?php echo $_SESSION[id_usuario] ?>" name="id_usuario" require type="text" class="form-control" placeholder="id">
  </div>
  <div class="form-group">
    <label name="status">Status</label>
    <select name="status" class="form-control">
      <option value="">Selecione</option>
      <option value="1">Feito</option>
      <option value="2">Não Feito</option>
    </select>
  </div>
  <button name="cadastrar" type="submit" class="btn btn-primary">Alterar</button>
</form>
</div>