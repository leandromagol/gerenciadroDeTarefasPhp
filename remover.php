<?php
/**
 * Created by PhpStorm.
 * User: leuzz
 * Date: 05/03/18
 * Time: 16:03
 */
include 'config.php';
include "banco.php";

remover_tarefa($mysqli,$_GET['id']);
header('Location:tarefas.php');