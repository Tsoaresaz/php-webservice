<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 14:24
 */

namespace App\Model\Service;

use App\Model\Dao\ClienteDao;
use App\Model\Entity\Cliente;

class ClienteService {

    public function getClientAllService() {
        $clienteDao = new ClienteDao();
        return $clienteDao->listClientAll();
    }

    public function getClienteByIdService(Cliente $cliente) {
        $clienteDao = new ClienteDao();
        $result = $clienteDao->listClientByID($cliente);
        return $result;
    }

    public function saveClientService(Cliente $cliente) {

        $clienteDao = new ClienteDao();
        return $clienteDao->insertDao($cliente);
    }

}