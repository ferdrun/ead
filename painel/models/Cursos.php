<?php
class Cursos extends Model {

     public function getCursos() {
        $array = array();

        $sql = "SELECT
         *,
         (select count(*) from aluno_curso where aluno_curso.id_curso = cursos.id) as qtalunos
         FROM cursos";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
     }

     public function getCurso($id) {
         $array = array();
        $sql = "SELECT * FROM cursos WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
         return $array;
     }

     public function dell($id) {

        $sql = "SELECT id FROM aulas WHERE id_curso = '$id'";
      
        $sql = $this->db->query($sql);
     
        if($sql->rowCount() > 0) {
            $aulas = $sql->fetchAll();

            foreach($aulas as $aula) {
                $sqlaula = "DELETE FROM historico WHERE id_aula = '".($aula['id_aula'])."'";
                $this->db->query($sql);

                $sqlaula = "DELETE FROM questionarios WHERE id_aula = '".($aula['id_aula'])."'";
                $this->db->query($sql);

                $sqlaula = "DELETE FROM videos WHERE id_aula = '".($aula['id_aula'])."'";
                $this->db->query($sql);
            }
        }

        $sql = "DELETE FROM aluno_curso WHERE id_curso = '$id'";
        $this->db->query($sql);

        $sql = "DELETE FROM aulas WHERE id_curso = '$id'";
        $this->db->query($sql);

        $sql = "DELETE FROM modulos WHERE id_curso = '$id'";
        $this->db->query($sql);

        $sql = "DELETE FROM cursos WHERE id = '$id'";
        $this->db->query($sql);
                
     }

     public function add($nome, $md5name, $descricao){

        $this->db->query("INSERT INTO cursos SET nome = '$nome', imagem = '$md5name', descricao = '$descricao'");
     }

     public function edit_curso($nome, $md5name, $descricao, $id) {

        $this->db->query("UPDATE cursos SET nome = '$nome', descricao = '$descricao' WHERE id = '$id'");
        
     }

     public function edit_cursoImg($md5name, $id) {

        $this->db->query("UPDATE cursos SET imagem = '$md5name' WHERE id = '$id'");
     }

     public function getCursosInscritos($id_aluno) {
        $array = array();

        $sql = "SELECT id_curso FROM aluno_curso WHERE id_aluno = '$id_aluno'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $rows = $sql->fetchAll();

            foreach($rows as $row) {
                $array[] = $row['id_curso'];
            }
        }

        return $array;
     }

}