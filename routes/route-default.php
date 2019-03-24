<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 14:32
 */

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($configuration);

require_once 'dependency.php';

require_once 'route-service/route-cliente/route-cliente.php';

$app->run();