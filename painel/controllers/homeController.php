<?php
class homeController extends Controller {

    public function __construct() {
        parent::__construct();
        $usuarios = new Usuarios();

        if(!$usuarios->isLogged()) {
            header("Location: ".BASE."login");
        }
	 
    }

    public function index() {
       $dados = array(
           'cursos' => array()
       );
        
       $cursos = new Cursos();
       $dados['cursos'] = $cursos->getCursos();

        $this->loadTemplate('home', $dados);
    }

    public function excluir($id) {

        if(!empty($id)) {
            $id = addslashes($id);
            $curso = new Cursos();
            $curso->dell($id);

            header("Location: ".BASE);
            exit;
           
        }

        header("Location :".BASE);
    }


        

          public function adicionar() {
            $dados = array();

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {
               
                $nome = addslashes($_POST['nome']);
                $descricao = addslashes($_POST['descricao']);
                $imagem = $_FILES['imagem'];

                if(!empty($_FILES['imagem']['tmp_name'])) {

                    $md5name = md5(time().rand(0,9999)).'.jpg';
                    $types = array('image/jpeg', 'image/jpg', 'image/png');

                    if(in_array($imagem['type'], $types)){
                        move_uploaded_file($imagem['tmp_name'],"../assets/images/cursos/".$md5name);

                        $curso = new Cursos();
                        $curso->add($nome, $md5name, $descricao);
                        
                        header("Location: ".BASE);
                    }
                }
            }
            $this->loadTemplate("curso_add", $dados);
        }

        public function editar($id) {
            $dados = array(
                'curso' => array(),
                'modulos' => array()
            );

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {
                $nome = addslashes($_POST['nome']);
                $descricao = addslashes($_POST['descricao']);
                $imagem = $_FILES['imagem'];

                $curso = new Cursos();
                $curso->edit_curso($nome, $md5name, $descricao, $id);
                

                if(!empty($imagem['tmp_name'])) {
                    $md5name = md5(time().rand(0,9999)).'.jpg';
                    $types = array('image/jpeg', 'image/jpg', 'image/png');

                    if(in_array($imagem['type'], $types)){
                        move_uploaded_file($imagem['tmp_name'],"../assets/images/cursos/".$md5name);

                        $curso->edit_cursoImg($md5name, $id);
                        
                        header("Location: ".BASE);
                    }
                }
            }
            $modulos = new Modulos();

            if(isset($_POST['modulo']) && !empty($_POST['modulo'])){
                $modulo = utf8_decode(addslashes($_POST['modulo']));
                $modulos->addModulo($modulo,$id);
            }

            //Usuário adicionou uma aula nova
            if(isset($_POST['aula']) && !empty($_POST['aula'])) {
                $aula = addslashes($_POST['aula']);
                $moduloaula = addslashes($_POST['moduloaula']);
                $tipo = addslashes($_POST['tipo']);

                $aulas = new Aulas();
                $aulas->addAula($id, $moduloaula, $aula, $tipo);
            }

            $curso = new Cursos();
            $dados['curso'] = $curso->getCurso($id);

            $dados['modulos'] = $modulos->getModulos($id);

            $this->loadTemplate('curso_edit', $dados);
        }

        public function del_modulo($id) {

            if(!empty($id)) {
                $id = addslashes($id);
                $modulos = new Modulos();
               $id_curso = $modulos->deleteModulos($id);

                header("Location: ".BASE."home/editar/".$id_curso);
                exit;
               
            }

            header("Location :".BASE);
        }

        public function edit_modulo($id) {
            $array = array();

            $modulos = new Modulos();

            if(isset($_POST['modulo']) && !empty($_POST['modulo'])) {
                $nome = utf8_decode(addslashes($_POST['modulo']));
                $id_curso = $modulos->updateModulo($nome, $id);
                
                header("Location: ".BASE."home/editar/".$id_curso);
                exit;

            }
           
            $array['modulo'] = $modulos->getModulo($id);

            $this->loadTemplate('curso_edit_modulo', $array);
        }

        public function del_aula($id) {

            if(!empty($id)) {

                $id = addslashes($id);
                $aulas = new Aulas();

                $id_curso = $aulas->deleteAula($id);

                header("Location: ".BASE."home/editar/".$id_curso);
                exit;
               
            }

            header("Location :".BASE);
        }
        

        public function edit_aula($id) {
            $dados = array();
            $view = 'curso_edit_aula_video';

            $aulas = new Aulas();

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {
                $nome = addslashes($_POST['nome']);
                $descricao = addslashes($_POST['descricao']);
                $url = addslashes($_POST['url']);

                $id_curso = $aulas->updateVideoAula($id, $nome, $descricao, $url);

                header("Location: ".BASE."home/editar/".$id_curso);
            }

            if(isset($_POST['pergunta']) && !empty($_POST['pergunta'])) {
                $pergunta = addslashes($_POST['pergunta']);
                $opcao1 = addslashes($_POST['opcao1']);
                $opcao2 = addslashes($_POST['opcao2']);
                $opcao3 = addslashes($_POST['opcao3']);
                $opcao4 = addslashes($_POST['opcao4']);
                $resposta = addslashes($_POST['resposta']);

                $id_curso = $aulas->updateQuestionarioAula($id, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $resposta);

                header("Location: ".BASE."home/editar/".$id_curso);
            }


      
            $dados['aula'] = $aulas->getAula($id);

            if($dados['aula']['tipo'] == 'video') {
                $view = 'curso_edit_aula_video';
            } else {
                $view = 'curso_edit_aula_poll';
            }

            $this->loadTemplate($view, $dados);
        }

}