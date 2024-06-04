<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;

use Laminas\View\Model\ViewModel;
use Library\DB;

class RegistroController extends AbstractActionController
{
    private $db;
    private $retorno = [
        'error' => false,
        'error_code' => 0,
        'mensaje' => '',
        'data' => ''
    ];

    private function jsonResponse($retorno)
    {
        $response = $this->getResponse();
        $response->setContent(json_encode($retorno));
        $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
        return $response;
    }

    public function __construct()
    {
        $this->db = new DB();
    }

    public function registroAction()
    {
        return new ViewModel();
    }

    public function registroEnviarAction()
    {
        $this->retorno['error'] = false;
        return $this->jsonResponse($this->retorno);
    }
}
