<?php
/**
 * Created by PhpStorm.
 * User: leuzz
 * Date: 02/03/18
 * Time: 16:45
 */

$bdServidor = 'localhost';
$bdUsuario = 'tarefas';
$bdSenha = 'tarefasdba12345!A';
$bdbanco = 'Tarefas';

$conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdbanco);

if (mysqli_connect_errno($conexao)){
    echo "Problemas para conectar ao banco por favor verifique os dados!";
    die();
}


function buscar_tarefas($conexao){
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao,$sqlBusca);

    $tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)){
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}

function gravar_tarefa($conexao, $tarefa) {
    $sqlGravar = "
       INSERT INTO tarefas( nome,descricao,prazo,prioridade,concluida)
       VALUES(
       '{$tarefa['nome']}',
       '{$tarefa['descricao']}',
       '{$tarefa['prazo']}' ,
       {$tarefa['prioridade']},
       {$tarefa['concluida']}
       )
       
       ";
    mysqli_query($conexao,$sqlGravar);

}

function buscar_tarefa($conexao, $id){
    $sqlBusca = 'SELECT * FROM `tarefas` WHERE id = '.$id;
    $resultado = mysqli_query($conexao,$sqlBusca);
    return mysqli_fetch_assoc($resultado);

}
function editar($conexao,$tarefa){
    $sqlEditar = "update tarefas set
    nome = '{$tarefa['nome']}',
    descricao = '{$tarefa['descricao']}',
    prazo = '{$tarefa['prazo']}',
    prioridade = '{$tarefa['prioridade']}', 
    concluida = '{$tarefa['concluida']}'
    where id = {$tarefa['id']}";
    mysqli_query($conexao,$sqlEditar);

}

function remover_tarefa($conexao,$id){
    $sqlRemover = "delete FROM tarefas WHERE  id = {$id}";

  mysqli_query($conexao,$sqlRemover);
}