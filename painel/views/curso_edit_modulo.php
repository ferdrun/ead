<fieldset>
    <legend>Adicionar Módulo Novo</legend>
    <form method="POST">
        Nome do módulo:<br>
        <input type="text" name="modulo" value="<?php echo utf8_encode($modulo['nome']); ?>" />

        <input type="submit" value="Salvar" />
    </form>
</fieldset>
