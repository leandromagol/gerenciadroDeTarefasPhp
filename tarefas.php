<?php
session_start();
include 'config.php';
include "banco.php";
include "ajudantes.php";
include 'Classes/Tarefas.php';

$tarefas = new Tarefas($mysqli);



$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
    $tarefa = array();

    if (isset($_POST['nome']) && strlen($_POST['nome']) > 0 ) {
      $tarefa['nome'] = $_POST['nome'];
    }else{
        $tem_erros = true;
        $erros_validacao['nome']='O nome das tarefa e obirgatorio';
    }

    if (isset($_POST['descricao'])){
        $tarefa['descricao'] = $_POST['descricao'];
        }else{
        $tarefa['descricao'] = '';
    }




    if (isset($_POST['prazo']) && strlen($_POST['prazo']) > 0){
        if (validar_data($_POST['prazo'])) {
            $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
        }else{
            $tem_erros = true;
            $erros_validacao['prazo'] = 'O prazo nao e uma data valida';
        }

    }else{
        $tarefa['prazo'] = '';
    }





    $tarefa['prioridade'] = $_POST['prioridade'];

    if (isset($_POST['concluida'])){
        $tarefa['concluida'] = 1;
    }else{
        $tarefa['concluida'] = 0;
    }
    if (! $tem_erros) {
        $tarefas->gravar_tarefa( $tarefa);
       if (isset($_POST['lembrete']) && $_POST['lembrete'] == '1') {
           enviar_email($tarefa);
       }

    header("Location:tarefas.php");
    die();
    }



}

$tarefas->buscar_tarefas();


$tarefa = array(
'id' => 0,
    'nome' => (isset($_POST['nome'])) ? 
     $_POST['nome'] : '',
    'descricao' => (isset($_POST['descricao'])) ?
     $_POST['descricao'] :'',
    'prazo' =>(isset($_POST['prazo'])) ? 
    traduz_data_para_banco($_POST['prazo']) : '',
    'prioridade'=> (isset($_POST['prioridade'])) ?
    $_POST['prioridade'] : 1,
    'concluida' => (isset($_POST['concluida'])) ?
    $_POST['concluida'] : ''
);

include "template.php";