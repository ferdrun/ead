<?php
class alunosController extends Controller {

    public function __construct() {
        parent::__construct();
        $usuarios = new Usuarios();

        if(!$usuarios->isLogged()) {
            header("Location: ".BASE."login");
        }
	 
    }

    public function index() {
       $dados = array(
           'alunos' => array()
       );

       $alunos = new Alunos();
       $dados['alunos'] = $alunos->getAlunos();
     

        $this->loadTemplate('alunos', $dados);
    }

    public function excluir($id) {
        $alunos = new Alunos();

        $alunos->dell_alunos($id);

        header("Location: ".BASE.'alunos');


        }

        public function adicionar() {
            $dados = array();

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {
               
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = md5($_POST['senha']);
                
                $alunos = new Alunos();
                $alunos->addAlunos($nome, $email, $senha);
                    
                header("Location: ".BASE.'alunos');
                
                }
                
            
            $this->loadTemplate("alunos_add", $dados);
        

        }

        public function editar($id) {
            $dados = array(
                'aluno' => array(),
                'cursos' => array ()
            );

            $alunos = new Alunos();

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {
                
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = md5($_POST['senha']);
                $cursos = $_POST['cursos'];
                $alunos->edit_alunos($id, $nome, $email, $senha, $cursos);

               header("Location: ".BASE.'alunos');
                
         }
    
           
            $cursos = new Cursos();

            $dados['aluno'] = $alunos->getAluno($id);
            $dados['cursos'] = $cursos->getCursos();
            $dados['inscrito'] = $cursos->getCursosInscritos($id);

            
            $this->loadTemplate('alunos_edit', $dados);
        }
}