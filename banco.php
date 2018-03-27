<?php
/**
 * Created by PhpStorm.
 * User: leuzz
 * Date: 02/03/18
 * Time: 16:45
 */


//$conexao = mysqli_connect(BD_SERVIDOR,BD_USUARIO,BD_SENHA,BD_BANCO);
$mysqli = new mysqli(BD_SERVIDOR,BD_USUARIO,BD_SENHA,BD_BANCO);
if ($mysqli->connect_errno){
    echo "Problemas para conectar ao banco por favor verifique os dados!";
    die();
}








function remover_tarefa($mysqli,$id){
    $sqlRemover = "delete FROM tarefas WHERE  id = {$id}";

   $mysqli->query($sqlRemover);
}

function gravar_anexo($mysqli,$anexo){
  $slqAnexo = "INSERT INTO anexos (tarefa_id,nome,arquivo)
  VALUES ({$anexo['tarefa_id']},
'{$anexo['nome']}',
'{$anexo['arquivo']}')";
  $mysqli->query($slqAnexo);
}

function buscar_anexos($conexao,$tarefa_id){
  $sql = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
  $resultado = $mysqli->query($conexao,$sql);
  $anexos = array();

  while ($anexo = mysqli_fetch_assoc($resultado)) {
    $anexos[]= $anexo;
  }

return $anexos;
}