<?php
  error_reporting(0);
  include("conexao.php");

  $sql_code = "SELECT tarefa.titulo, tarefa.descricao, tarefa.data_hora_inicio, tarefa.data_hora_termino, usuario.login, tarefa.status FROM tarefa INNER JOIN usuario ON tarefa.id_usuario=usuario.id ";
  $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
  $line = $sql_query->fetch_assoc(0);

  $status[1] = "Feito";
  $status[2] = "Não feito";
?>

<div class="d-flex justify-content-center align-items-center">
  <h2>Tarefas</h2>
  <a href="tarefas.php?p=create&usuario=" class="btn btn-link">Cadastrar</a>
</div>
<div class="d-flex justify-content-center align-items-center">
<table class="table table-bordered table-sm w-75 p-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data e hora de início</th>
      <th scope="col">Data e hora de término</th>
      <th scope="col">Usuário</th>
      <th scope="col">Status</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <?php
    while($line = $sql_query->fetch_assoc()) {
  ?>
    <tr>
      <td><?php echo $line['titulo']; ?></td>
      <td><?php echo $line['descricao']; ?></td>
      <td><?php echo $line['data_hora_inicio']; ?></td>
      <td><?php echo $line['data_hora_termino']; ?></td>
      <td><?php echo $line['login']; ?></td>
      <td><?php echo $status[$line['status']]; ?></td>
      <td>
      <a href="tarefas.php?p=update&tarefa=<?php echo $line['id'] ?>" class="btn btn-link">Editar</a>
      <a href="javascript: if(confirm('Deseja deletar esta tarefa?'))
      location.href='tarefas.php?p=delete&tarefa=<?php echo $line['id'] ?>';" class="btn btn-link">Deletar</a>
      </td>
    </tr>
  <?php
    }
  ?>
</table>
</div>