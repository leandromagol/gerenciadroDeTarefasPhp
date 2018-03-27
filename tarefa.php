<?php
include 'config.php'; 
include "banco.php";
include "ajudantes.php";
include "Classes/Tarefas.php";

$tarfas-> new Tarefas($mysqli)
$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
	$tarefa_id = $_POST['tarefa_id'];


	if (! isset($_FILES['anexo'])) {
	 $tem_erros = true;
	 $erros_validacao['anexo']= "Voce deve selecionar um aquivo para anexar";
	}else{
		if (tratar_anexo($_FILES['anexo'])) {
		$anexo = array();
		$anexo['tarefa_id'] = $tarefa_id;
		$anexo['nome'] = $_FILES['anexo']['name'];
		$anexo['arquivo'] = $_FILES['anexo']['name'];
		}else{
			$tem_erros = true;
			$erros_validacao['anexo']= "Envie apenas arquivos nos formatos pdf ou zip";}
		}
	
	if (!$tem_erros) {
	gravar_anexo($mysqli,$anexo);
	}
	


}
$tarefa = buscar_tarefa($conexao,$_GET['id']);
$anexos = buscar_anexos($conexao,$_GET['id']);

include "template_tarefa.php"; 