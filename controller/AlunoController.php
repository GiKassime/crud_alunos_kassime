<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../model/Aluno.php");
require_once(__DIR__ . "/../service/AlunoService.php");

class AlunoController {

    private AlunoDAO $alunoDAO;
    private AlunoService $alunoService;

    public function __construct() {
        $this->alunoDAO = new AlunoDAO(); 
        $this->alunoService = new AlunoService();
    }

    public function listar() {
        $lista = $this->alunoDAO->listar();
        return $lista;
    }
    
    public function inserir(Aluno $aluno) {
        $erros = $this->alunoService->validarAluno($aluno);
        if (count($erros) > 0) {
            return $erros;
        }
        $erro = $this->alunoDAO->inserir($aluno);
        if ( $erro != NULL ) {
            array_push($erros, "Erro ao salvar o aluno ");
            if (AMB_DEV) {
                array_push($erros, $erro->getMessage() );
            }
        }
        return $erros;
    }
    public function alterar(Aluno $aluno){
        $erros = $this->alunoService->validarAluno($aluno);
        if (count($erros) > 0) {
            return $erros;
        }
        //se não deu erros, alterar o aluno no bdd
        $erro = $this->alunoDAO->alterar($aluno);
        if ( $erro != NULL ) {
            array_push($erros, "Erro ao alterar o aluno ");
            if (AMB_DEV) {
                array_push($erros, $erro->getMessage() );
            }
        }
        return $erros;
    }

    public function buscarPorId(int $id) {
        $aluno = $this->alunoDAO->buscarPorId($id);
        return $aluno;
    }
    public function excluir(int $id) {
        $erro = $this->alunoDAO->excluir($id);
        if ( $erro != NULL ) {
            array_push($erros, "Erro ao excluir o aluno ");
            if (AMB_DEV) {
                array_push($erros, $erro->getMessage() );
            }
        }
        return $erros;
    }


}