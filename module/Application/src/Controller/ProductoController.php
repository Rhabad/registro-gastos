<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Library\DB;
use Models\Producto\Gateway\ProductoGw;
use Models\Producto\Model\Producto;

class ProductoController extends AbstractActionController
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public $retorno = [
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


    /**
     * mantenedor producto
     */

    public function productoAgregarAction()
    {
        $productoGw = new ProductoGw($this->db);


    }

    public function productoEnviarAction()
    {
        $data = $this->params()->fromPost();
        $productoGw = new ProductoGw($this->db);

        $producto = new Producto(
            null,
            $data['nombreProd'],
            $data['tipoProd'],
            $data['precio'],
            $data['precioOferta']
        );

        $productoGw->createProducto($producto);

        $this->retorno['error'] = false;
        return $this->jsonResponse($this->retorno);

    }

    public function productoListarAction()
    {
        $prodGw = new ProductoGw($this->db);

        $productos = $prodGw->listarProductos();

        return [
            "productos" => $productos
        ];
    }

    /**
     * mantenedor producto
     */
}