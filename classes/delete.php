<?php

  error_reporting(0);
  include("conexao.php");

  $ident = intval($_GET['tarefa']);

  $sql_code = "DELETE FROM tarefa WHERE id = '$ident'";
  $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

  if($sql_query)
    echo "<script> alert('Tarefa excluída com sucesso!'); location.href='tarefas.php?p=view'; </script>";
  else 
    echo "<script >alert('Não foi possível realizar a exclussão!'); location.href='tarefas.php?p=view'; </script>";
?>