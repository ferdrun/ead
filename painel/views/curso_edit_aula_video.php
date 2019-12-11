 <h1>Editar Aula - Vídeo<h1>

 <form method="POST">

 Título da aula: <br>
 <input type="text" name="nome" value="<?php echo $aula['nome']; ?>"/><br><br>

 Descrição da aula:<br>
 <textarea name="descricao" value="<?php echo $aula['descricao']; ?>"></textarea><br><br>

 URL do vídeo:<br>
 <input type="text" name="url" value="<?php echo $aula['url']; ?>" /><br><br>

<input type="submit" value="Salvar" />
 </form>