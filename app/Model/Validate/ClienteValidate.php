<?php
/**
 * Created by PhpStorm.
 * User: Família
 * Date: 24/03/2019
 * Time: 14:56
 */

namespace App\Model\Validate;

use App\Model\Entity\Cliente;

class ClienteValidate {


    public function clienteValidateID(Cliente $cliente) {

        $resultError = new ResultValidate();

        if(empty($cliente->getId())) {
            $resultError->setError('id', 'Informe um ID');
        }

        if(!is_numeric($cliente->getId())) {
            $resultError->setError('id', 'Informe um número e ID');
        }
        return $resultError;
    }

    public function clientFormValidate(Cliente $cliente) {

        $resultError = new ResultValidate();

        if(empty($cliente->getNome())) {
            $resultError->setError('nome', 'Informe o nome');
        }

        if(empty($cliente->getTelefone())) {
            $resultError->setError('telefone', 'Informe o telefone');
        }

        if(empty($cliente->getCelular())) {
            $resultError->setError('celular', 'Informe o celular');
        }

        if(empty($cliente->getCep())) {
            $resultError->setError('cep', 'Informe o cep');
        }

        if(empty($cliente->getEndereco())) {
            $resultError->setError('endereco', 'Informe o endereco');
        }

        if(empty($cliente->getNumero())) {
            $resultError->setError('numero', 'Informe o numero');
        }

        if(empty($cliente->getBairro())) {
            $resultError->setError('bairro', 'Informe o bairro');
        }

        if(empty($cliente->getCidade())) {
            $resultError->setError('cidade', 'Informe a cidade');
        }

        if(empty($cliente->getEstado())) {
            $resultError->setError('estado', 'Informe o estado');
        }

        return $resultError;
    }

}