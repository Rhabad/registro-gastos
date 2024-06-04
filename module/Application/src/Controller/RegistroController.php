<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;

use Laminas\View\Model\ViewModel;
use Library\DB;
use Models\Establecimiento\Gateway\EstablecimientoGw;
use Models\TipoProducto\Gateway\TipoProductoGw;

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
        $tipoGw = new TipoProductoGw($this->db);
        $establGw = new EstablecimientoGw($this->db);

        $tipo = $tipoGw->listarTipo();
        $establ = $establGw->listarEstablecimiento();

        return [
            'tipos' => $tipo,
            'establs' => $establ
        ];
    }

    public function registroEnviarAction()
    {
        $this->retorno['error'] = false;
        return $this->jsonResponse($this->retorno);
    }
}
