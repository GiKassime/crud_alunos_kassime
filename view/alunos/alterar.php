<?php
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");


$aluno = null;
$msgErro = "";
$id = null;
if (isset($_POST['nome'])) {
   //Usuário já clicou no gravar
    $nome  = trim($_POST['nome']) ? trim($_POST['nome']) : NULL ;
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL ;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL ;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL ;

    //Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setId($id);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);
    
    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);
    //chamando o alterar do controller
    $alunoCont = new AlunoController();
  

    $erros =  $alunoCont->alterar($aluno);
    if (!$erros) {    
        header("location: listar.php");

    }else{
        $msgErro = implode("<br>", $erros);
    }
} else {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id == null) {
        echo "ID não informado.<br><a href='listar.php'>Voltar</a>";
        exit;
    }
    $alunoCont = new AlunoController();
    $aluno = $alunoCont->buscarPorId($id);

    if (!$aluno) {
        echo "Aluno não encontrado.<br><a href='listar.php'>Voltar</a>";
        exit;
    }

}


include_once(__DIR__ . "/form.php");
