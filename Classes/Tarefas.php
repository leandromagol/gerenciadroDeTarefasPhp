<?php 
/**
* 
*/
class tarefas {
	public $mysqli;
	public $tarefas =array();
	public $tarefa;
	
	function __construct($novo_mysqli)
	{
		$this->mysqli = $novo_mysqli;
	}


	//buscar todas tarefas
   function buscar_tarefas(){
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = $this->mysqli->query($sqlBusca);

    $this->tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)){
        $this->tarefas[] = $tarefa;
    }
   
    }

    //buscar uma tarefa
    function buscar_tarefa($id){
    $sqlBusca = 'SELECT * FROM `tarefas` WHERE id = '.$id;
    $resultado = $this->mysqli->query($sqlBusca);
    $this->tarefa = mysqli_fetch_assoc($resultado);

}
//Gravar Tarefa
function gravar_tarefa($tarefa) {
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
    $this->mysqli->query($sqlGravar);

}
//Editar Tarefa
function editar($tarefa){
    $sqlEditar = "update tarefas set
    nome = '{$tarefa['nome']}',
    descricao = '{$tarefa['descricao']}',
    prazo = '{$tarefa['prazo']}',
    prioridade = '{$tarefa['prioridade']}', 
    concluida = '{$tarefa['concluida']}'
    where id = {$tarefa['id']}";
   $this->mysqli->query($sqlEditar);

}
//remover tarefa


}

 ?>