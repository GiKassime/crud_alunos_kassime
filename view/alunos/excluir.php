<?php 
require_once(__DIR__ . "/../../controller/AlunoController.php");

$id = $_GET['id'] ?? null;
$alunoCont = new AlunoController();
if (!$id) {
    echo "ID não informado.<br><a href='listar.php'>Voltar</a>";
    exit;
}
if($alunoCont->buscarPorId($id)){
    $alunoCont->excluir($id);
    header("location: listar.php");
}else{
    echo "Aluno não encontrado.";
    echo "<br><a href='listar.php'>Voltar</a>";
    exit;
}

?>
