<h3>Editar Aluno<h3>

<form method="POST">

    Nome do Aluno:<br>
    <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" /> <br><br>

    E-mail do Aluno:<br>
    <input type="email" name="email" value="<?php echo $aluno['email']; ?>" /> <br><br>

    Senha do Aluno:<br>
    <input type="password" name="senha" value="<?php echo $aluno['senha']; ?>" /> <br><br>

    cursos inscritos: (Segure CRTL para selecionar outros cursos) <br>
    <select name="cursos[]" multiple style="height:150px">
        <?php foreach($cursos as $curso): ?>
            <option value="<?php echo $curso['id']; ?>"<?php
            if(in_array($curso['id'], $inscrito)) {
                echo 'selected="selected"';
            }
            ?>><?php echo $curso['nome']; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <input type="submit" value="Salvar" />

</form>