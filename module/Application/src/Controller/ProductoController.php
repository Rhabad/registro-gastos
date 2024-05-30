<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Library\DB;
use Models\Producto\Gateway\ProductoGw;

class ProductoController extends AbstractActionController
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function productoAgregarAction()
    {
        $productoGw = new ProductoGw($this->db);
        $data = $this->params()->fromPost();


    }
}