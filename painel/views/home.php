 <h1>CURSOS<h1>

 <a href="<?php echo BASE; ?>home/adicionar">Adicionar Curso</a><br>
 
 <table border="0" width="100%">
     <tr>
         <th>Imagem</th>
         <th>Nome</th>
         <th width="80">Qt. de Alunos</th>
         <th width="200">Ações</th>
     </tr>
     <?php foreach($cursos as $curso): ?>
     <tr>
         <td width="150"><img src="<?php echo BASE; ?>../assets/images/cursos/<?php echo $curso['imagem']; ?> " border="0" height="60" /></td>
         <td><?php echo $curso['nome']; ?></td>
         <td align="center"><?php echo $curso['qtalunos']; ?></td>
         <td>
         <a href="<?php echo BASE; ?>home/editar/<?php echo $curso['id']; ?>"> [Editar curso] -</a>
         <a href="<?php echo BASE; ?>home/excluir/<?php echo $curso['id']; ?>"> [Excluir curso] </a>
     </td>
     </tr>
     <?php endforeach; ?>
</table>