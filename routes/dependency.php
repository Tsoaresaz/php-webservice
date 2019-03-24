<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 14:48
 */
use App\Model\Service\ClienteService;

$container = $app->getContainer();

$container['clienteServico'] = function($container) {
    $clienteServico = new ClienteService();
    $result = $clienteServico->getClient();
    return $result;
};