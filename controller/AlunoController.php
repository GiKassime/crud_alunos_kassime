<?php 
require_once(__DIR__ . '/../dao/AlunoDAO.php');
class AlunoController{
    private AlunoDao $alunoDAO;
    public function __construct() {
        $this->alunoDAO = new AlunoDAO();
    }
    public function listar(){
        $lista = $this->alunoDAO->listar();

        return $lista;
    }
}

?>