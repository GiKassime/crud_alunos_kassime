<?php
    require_once(__DIR__ . "/../../controller/AlunoController.php");   

    //Chamar o controller para obter a lista de alunos
    $alunoCont = new AlunoController();
    $lista = $alunoCont->listar();

    //print_r($lista);


    //Incluir o header
    include_once(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de Alunos</h3> 

<div>
    <a href="inserir.php">Inserir</a>
</div>

<table border="1">
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <!-- Dados -->
    <?php foreach($lista as $aluno): ?>
        <tr>
            <td><?= $aluno->getId() ?></td>
            <td><?= $aluno->getNome() ?></td>
            <td><?= $aluno->getIdade() ?></td>
            <td><?= $aluno->getEstrangeiroTexto() ?></td>
            <td><?= $aluno->getCurso() ?></td>
            <th><a href="./alterar.php?id=<?= $aluno->getId() ?>"><img src="./../../img/btn_editar.png" alt=""></a></th>
            <th><a href="./excluir.php?id=<?= $aluno->getId() ?>" onclick="return confirm('Tem certeza que deseja excluir <?= $aluno->getNome()?>?');"><img src="./../../img/btn_excluir.png" alt=""></a></th>
        </tr>
    <?php endforeach; ?>


</table>

<?php
    //Incluir o footer
    include_once(__DIR__ . "/../include/footer.php");   
?>
    
