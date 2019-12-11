<h1>Alunos</h1>

<a href="<?php echo BASE; ?>alunos/adicionar">Adicionar aluno</a><br>

<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th width="80">Qt. de Cursos</th>
        <th width="200">Ações</th>
    </tr>
    <?php foreach($alunos as $aluno): ?>
    <tr>
        <td><?php echo $aluno['nome']; ?></td>
        <td align="center"><?php echo $aluno['qtcursos']; ?></td>
        <td>
        <a href="<?php echo BASE; ?>alunos/editar/<?php echo $aluno['id']; ?>">Editar Aluno -</a>
        <a href="<?php echo BASE; ?>alunos/excluir/<?php echo $aluno['id']; ?>"> Excluir Aluno</a>
    </td>
    </tr>
    <?php endforeach; ?>
</table>