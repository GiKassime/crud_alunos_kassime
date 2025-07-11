<?php 
//incluir o header
require_once (__DIR__.'/../../controller/AlunoController.php');
include_once (__DIR__.'/../include/header.php');
$alunoCont = new AlunoController();
$lista = $alunoCont->listar();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>ID_Curso</th>
        <th>Curso</th>
        <th>Turno</th>
    </tr>
    <?php 
    foreach ($lista as $aluno): ?>
        <tr>

            <td><?= $aluno->getId()?></td>
            <td><?= $aluno->getNome()?></td>

            <td><?= $aluno->getIdade()?></td>
            <td><?= $aluno->getEstrangeiroTexto()?></td>
            <?php $curso = $aluno->getCurso();?>
            <td><?= $curso->getId()?></td>

            <td><?= $curso->getNome()?></td>
            <td><?= $curso->getTurnoTexto()?></td>





        </tr>
    <?php endforeach;?>

</table>
<?php
//incluir o footer
include_once (__DIR__.'/../include/footer.php');
?>