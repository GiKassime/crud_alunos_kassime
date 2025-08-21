<?php 
require_once(__DIR__ . "/../../controller/AlunoController.php");

$id = $_GET['id'] ?? null;
$alunoCont = new AlunoController();
if (!$id) {
    echo "ID não informado.<br><a href='listar.php'>Voltar</a>";
    exit;
}
if($alunoCont->buscarPorId($id)){
    $erro = $alunoCont->excluir($id);
    if(!$erro){
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    }else{
        echo "Erro ao excluir o aluno.";
        echo "<br>" . $erro->getMessage();
        echo "<br><a href='listar.php'>Voltar</a>";
        exit;
    }
}else{
    echo "Aluno não encontrado.";
    echo "<br><a href='listar.php'>Voltar</a>";
    exit;
}

?>
