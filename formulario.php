<div class="container">
<form method="POST" >
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>"/>

    <fieldset>
        <legend>Nova tarefa</legend>
        
        <div class="form-group">
        <label>Tarefa:</label>
            <?php if ($tem_erros && isset($erros_validacao['nome'])): ?>
                <span class="alert alert-danger" role="alert">
                    <?php echo $erros_validacao['nome']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="nome"  class="form-control" value="<?php echo $tarefa['nome']; ?>" />
        </div>

        <div class="form-group">
        <label>Descrição (Opcional):</label>
            <textarea name="descricao"  cols="10" rows="4" class="form-control">
                <?php echo $tarefa['descricao']; ?>
            </textarea>
        </div>
        
        <div class="form-group">
        <label>Prazo (Opcional): </label>
        <?php if ($tem_erros && isset($erros_validacao['prazo'])): ?>
            <span class="alert alert-danger " role="alert">
                <?php echo $erros_validacao['prazo']; ?>
            </span>
        <?php endif; ?>
            <input type="text" name="prazo" class="form-control" value="<?php echo traduz_data_para_exibir($tarefa['prazo']) ;?>" />
        </div>

        <fieldset class="form-group">
            <legend>Prioridade:</legend>
            <label>
                <input type="radio" name="prioridade" value="1" <?php echo ($tarefa['prioridade'] == 1)
                 ? 'checked'
                    :'';
                ?> />
                Baixa
                <input type="radio" name="prioridade" value="2" <?php echo ($tarefa['prioridade'] == 2)
                ? 'checked'
                    :'';
                ?> />
                Média
                <input type="radio" name="prioridade" value="3" <?php echo($tarefa['prioridade'] == 3)
                ?'checked'
                    : '';
                ?> />
                Alta
            </label>
        </fieldset>
        
        <label >
            Tarefa concluída:</label>
           <div class="form-group">
            <input type="checkbox" name="concluida" value="1"  <?php echo ($tarefa['concluida'] == 1)
            ? 'checked'
                :'';
            ?>/>
           </div>

            <div class="text-right">
            <input type="submit" class="btn btn-primary btn-lg btn-blocky " value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>"  />
               </div>
    </fieldset>
</form>


</div>