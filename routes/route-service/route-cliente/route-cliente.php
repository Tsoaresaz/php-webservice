<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 14:34
 */

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Model\Entity\Cliente;
use App\Model\Validate\ClienteValidate;
use App\Model\Service\ClienteService;

$app->group('/api/v1', function() {


    /**
     * Web Service: List all client
     */
    $this->get('/cliente', function(Request $request, Response $response) {

        $clienteService = new ClienteSerVice();
        $return = $clienteService->getClientAllService();
        return $response->withJson($return);
    });

    /**
     * Web Service: Client by ID
     */
    $this->get('/cliente/{id}', function(Request $request, Response $response, array $args) {

        $id = (int)$args['id'];

        $cliente = new Cliente();
        $cliente->setId($id);

        $validate = new ClienteValidate();
        $result = $validate->clienteValidateID($cliente);

        if($result->getError()) {
            $result = $result->getError();
            return $response->getBody()->write($result['id']);
        }

        $clienteService = new ClienteService();
        $return = $clienteService->getClienteByIdService($cliente);

        return $response->withJson($return);
    });


    /**
     * Web Service: Insert new client
     */
    $this->post('/cliente', function(Request $request, Response $response) {

        $dataForm = $request->getParsedBody();

        $cliente = new Cliente();
        $cliente->setNome($dataForm['cl_nome']);
        $cliente->setTelefone($dataForm['cl_telefone']);
        $cliente->setCelular($dataForm['cl_celular']);
        $cliente->setCep($dataForm['cl_cep']);
        $cliente->setEndereco($dataForm['cl_endereco']);
        $cliente->setNumero($dataForm['cl_numero']);
        $cliente->setBairro($dataForm['cl_bairro']);
        $cliente->setCidade($dataForm['cl_cidade']);
        $cliente->setEstado($dataForm['cl_estado']);

        $clienteValidate = new ClienteValidate();
        $returnValidate = $clienteValidate->clientFormValidate($cliente);

        if($returnValidate->getError()) {
            $returnError = $returnValidate->getError();
            var_dump($returnError);
        }

        $clienteService = new ClienteService();
        $returnService = $clienteService->saveClientService($cliente);

        if($returnService > 0) {
            return $response->getBody()->write('Dados gravado com sucesso. ID '. $returnService);
        }
        else {
            return $response->getBody()->write('Já existe este cadastro');
        }
    });

});

