<div class="cursoinfo">
    <img src="<?php echo BASE; ?>assets/images/cursos/<?php echo $curso->getImagem(); ?>" border="0" height="50px" />

<h3> <?php echo $curso->getNome(); ?></h3>
<?php echo $curso->getDescricao(); ?><br>
<?php if($aulas_assistidas > 0): ?>
<?php echo $aulas_assistidas.' / '.$total_aulas.' ('.(($aulas_assistidas/$total_aulas)*100).'%)'; ?>
<?php endif; ?>
</div>
<div class="curso_left">
    <?php foreach($modulos as $modulo): ?>
        <div class="modulo"><?php echo utf8_encode($modulo['nome']); ?></div>
        <?php foreach($modulo['aulas'] as $aula): ?>
          <a href="<?php echo BASE; ?>/cursos/aula/<?php echo $aula['id']; ?>">
          <div class="aula">
          <?php echo $aula['nome']; ?>
          <?php 
          if($aula['assistido'] == true): ?>
              <img style="float:right;margin-right:10px;margin-top:5px" src="<?php echo BASE; ?>assets/images/v.jpg" border="0" height="20" />
          <?php endif; ?>
          </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
<div class="curso_right">

</div>
