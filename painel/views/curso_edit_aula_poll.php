<h1>Editar Aula - Questionário<h1>

<form method="POST">

Pergunta:<br>
<input type="text" name="pergunta" value="<?php if(isset($aula['pergunta'])) echo $aula['pergunta']; ?>"/><br><br>

Opção 1:<br>
<input type="text" name="opcao1" value="<?php if(isset($aula['opcao1'])) echo $aula['opcao1']; ?>"/><br><br>

Opção 2:<br>
<input type="text" name="opcao2" value="<?php if(isset($aula['opcao2'])) echo $aula['opcao2']; ?>"/><br><br>

Opção 3:<br>
<input type="text" name="opcao3" value="<?php if(isset($aula['opcao3'])) echo $aula['opcao3']; ?>"/><br><br>

Opção 4:<br>
<input type="text" name="opcao4" value="<?php if(isset($aula['opcao4'])) echo $aula['opcao4']; ?>"/><br><br>

Resposta:<br>
<select name="resposta">
    <option value="1"  <?php if(isset($aula['respota'])) echo ($aula['resposta'] == '1')?'selected="selected"':''; ?>>Opção 1</option>
    <option value="2"  <?php if(isset($aula['resposta'])) echo ($aula['resposta'] == '2')?'selected="selected"':''; ?>>Opção 2</option>
    <option value="3"  <?php if(isset($aula['resposta'])) echo ($aula['resposta'] == '3')?'selected="selected"':''; ?>>Opção 3</option>
    <option value="4"  <?php if(isset($aula['respsota'])) echo ($aula['resposta'] == '4')?'selected="selected"':''; ?>>Opção 4</option>

<input type="submit" value="Salvar" />
</form>