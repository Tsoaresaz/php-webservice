<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 13:54
 */

namespace App\Model\Dao;

use PDO;
use App\Model\Entity\Cliente;

class ClienteDao extends BaseDao {

    public function __construct() {
        parent::__construct();
    }

    public function listClientAll() {

        $sql = "SELECT * FROM tb_cad_cliente";
        $result = $this->selectAll($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listClientByID(Cliente $cliente) {

        if($cliente->getId()) {
            $result = $this->selectAll(
                "SELECT * FROM tb_cad_cliente WHERE cl_id = {$cliente->getId()}"
            );
        }
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listClientByTermDao($col, $bind, $param) {
        $stmt = $this->selectByTerm("SELECT * FROM tb_cad_cliente WHERE $col = $bind ", array(
            $bind => $param
        ));

        $stmt->execute();
        return $stmt->rowCount();
    }


    public function insertDao(Cliente $cliente) {

        $sql = "INSERT INTO tb_cad_cliente ";
        $sql .= "VALUES ";
        $sql .= "(null, :nome, :telefone, :celular, :cep, :endereco, :numero, :bairro, :cidade, :estado) ";

        $params = array(
            ':nome' => $cliente->getNome(),
            ':telefone' => $cliente->getTelefone(),
            ':celular' => $cliente->getCelular(),
            ':cep' => $cliente->getCep(),
            ':endereco' => $cliente->getEndereco(),
            ':numero' => $cliente->getNumero(),
            ':bairro' => $cliente->getBairro(),
            ':cidade' => $cliente->getCidade(),
            ':estado' => $cliente->getEstado(),
        );

        $row = $this->listClientByTermDao('cl_celular', ':celular', $cliente->getCelular());

       if($row == 0) {
           $lastId = $this->insert($sql, $params);
           return $lastId;
       }
       else {
           return false;
       }
    }

}