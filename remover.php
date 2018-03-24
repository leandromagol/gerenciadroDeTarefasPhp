<?php
/**
 * Created by PhpStorm.
 * User: leuzz
 * Date: 05/03/18
 * Time: 16:03
 */
include "apoio/banco.php";

remover_tarefa($conexao,$_GET['id']);
header('Location:tarefas.php');